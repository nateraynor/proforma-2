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
			$customers = $this->proposal_model->getProposalCustomers($proposal_id);

			$data['proposals'][] = array(
				'proposal_id' 	=> $proposal['proposal_id'],
				'proposal_name'	=> $proposal['proposal_name'],
				'proposal_customers' => $customers,
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
		$data['proposal_products'] = $this->proposal_model->getProposalProducts($data['proposal']['proposal_code']);
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

		if ($proposal_id != -1) {
			$data['proposal'] 	= $this->proposal_model->getProposal($proposal_id);
			$data['proposal_customers'] 	= $this->proposal_model->getProposalCustomers($proposal_id);
			$data['notes'] 		= $this->proposal_model->getProposalNotes($proposal_id);
			$data['proposal_products'] 	= $this->proposal_model->getProposalProducts($proposal_id);
		}

		//$data['products'] = $this->product_model->getProducts(array());
		$data['customers'] = $this->customer_model->getCustomers(array());
		$data['templates'] = $this->setting_model->getTemplates();
		$data['tax_rates'] = $this->setting_model->getSetting('tax_rates');

		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['proposal_id'] = $proposal_id;
		$data['menu'] = 'proposals';
		$data['page'] = 'forms';
		$data['subview'] = 'proposals/proposal';
		$this->load->view('layouts/default', $data);
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