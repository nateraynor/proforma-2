<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposals extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }

	public function index() {
		$this->load->model('proposal_model');
		$this->load->model('setting_model');

		$filters = array();

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'proposalslist'))){
			$this->session->set_flashdata('error','Teklifler sayfasına erişim izniniz yoktur!');
			redirect('home');
		}

		$data['proposals'] = array();
		$proposals = $this->proposal_model->getProposals($filters);

		foreach ($proposals as $proposal) {

			$proposal_customers = array();
			$customers = $this->proposal_model->getProposalCustomers($proposal['proposal_id']);

			foreach ($customers as $customer) {
				$proposal_customers[] = $customer['customer_name'];
			}

			$names = '';
			$countNames = count($customers);
		
			 for ($i=0; $i < $countNames ; $i++) { 
			 		$names .= $proposal_customers[$i];
			 			if($i < $countNames -1)
			 				$names .= ',';
			 }

		 	$data['proposals_customers_name'] = $names;
		
			$data['proposals'][] = array(
				'proposal_id' 	=> $proposal['proposal_id'],
				'proposal_name'	=> $proposal['proposal_name'],
				'proposal_total'	 => $proposal['proposal_total'],
				'proposal_status'	 => $proposal['proposal_status']
			);
		}

		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['menu'] = 'proposals';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'proposals/proposal_list';

		$data['errors'] = $this->errors;
		$this->load->view('layouts/default', $data);
	}

	public function excelOutput() {
		$this->load->library('excel');
		$this->load->model('proposal_model');
		$results = $this->proposal_model->getProposalsForExcel();
        $this->excel->to_excel($results, 'proposals-excel', 'Teklifler');
	}

	public function preview($proposal_id) {
		$this->load->model('proposal_model');
		$this->load->model('setting_model');

		$data['proposal'] = $this->proposal_model->getProposal($proposal_id);
		$data['proposal_customers'] = $this->proposal_model->getProposalCustomers($proposal_id);
		$data['proposal_notes'] = $this->proposal_model->getProposalNotes($proposal_id);
		$data['proposal_products'] = $this->proposal_model->getProposalProducts($proposal_id);
		$data['templates'] = $this->setting_model->getTemplates();
		$data['company_info'] = $this->setting_model->getSetting('company_info');
		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['proposal_id'] = $proposal_id;
		$data['menu'] = 'proposals';
		$data['page'] = 'forms';
		$data['subview'] = 'proposals/preview';
		$this->load->view('layouts/default', $data);
	}

	public function proposal($proposal_id = -1) {
		$this->load->model('proposal_model');
		$this->load->model('product_model');
		$this->load->model('customer_model');
		$this->load->model('setting_model');
		$data['total'] = 0;
		$filters = array();
		$allowed_pages = $this->session->userdata['allowed_pages'];

		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'proposals/proposal'))){
			$this->session->set_flashdata('error','Teklif işlemleri sayfasına erişim izniniz yoktur!');
			redirect('home');
		}

		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;

			if ($proposal_id == -1) {
				$result = $this->proposal_model->addProposal($this->input->post());
				
				if ($result) {
					$this->session->set_flashdata('success', 'Teklif başarıyla oluşturuldu eklendi');
					redirect('proposals/preview/' . $result);
				}
			} else {
				$result = $this->proposal_model->updateProposal($this->input->post(), $proposal_id);

				if ($result) {
					$this->session->set_flashdata('success', 'Teklif başarıyla güncellendi');
					redirect('proposals');
				}
			}
		}

		$data['proposal_customer_ids'] = array();

		if ($proposal_id != -1) {
			$data['proposal'] 	= $this->proposal_model->getProposal($proposal_id);
			$data['proposal_customers'] = $this->proposal_model->getProposalCustomers($proposal_id);

			foreach ($data['proposal_customers'] as $customer) {
				$data['proposal_customer_ids'][] = $customer['customer_id'];
			}

			$data['notes'] 		= $this->proposal_model->getProposalNotes($proposal_id);
			$data['proposal_products'] 	= $this->proposal_model->getProposalProducts($proposal_id);
			foreach ($data['proposal_products'] as $proposal_product) {
				$data['total'] +=$proposal_product['product_price']	;	
			}


		}



		$data['customers'] = $this->customer_model->getCustomers(array());
		$data['templates'] = $this->setting_model->getTemplates();
		$data['tax_rates'] = $this->setting_model->getSetting('tax_rates');
		$data['exchange_rates'] = $this->setting_model->getSetting('exchange_rates');
		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['proposal_id'] = $proposal_id;
		$data['menu'] = 'proposals';
		$data['page'] = 'forms';
		$data['subview'] = 'proposals/proposal';
		$this->load->view('layouts/default', $data);
	}

	public function getExchangeRate(){
		$this->load->model('setting_model');

		$result_id = $this->input->post('result_id');
		$value = $this->input->post('value');
		$exchange_rates = $this->setting_model->getSetting('exchange_rates');
		foreach ($exchange_rates['exchange_rate'] as $exchange_rate) {
			if($result_id == $exchange_rate['exchange_rate_id'])
				echo $exchange_rate['rate'];
					die;
		}

		$rate = $this->proposal_model->getExchangeRate($result_id);

		echo $rate;
	}

	public function deleteProp($proposal_id) {
		$this->load->model('proposal_model');

		$result = $this->proposal_model->deleteproposal($proposal_id);

		if ($result)
			$this->session->set_flashdata('success', 'Ürün Marka başarıyla silindi!');
		else
			$this->session->set_flashdata('error', 'Ürün Marka silinemedi!');

		redirect('proposals');
	}

	public function addProposalProductAjax() {
		$this->load->model('proposal_model');

		$result = $this->proposal_model->addTemporaryProposalProduct($this->input->post());

		echo $result;
	}

	public function validate($data) {
		$errors = array();
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}


}
?>