<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposals extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
	
	public function index($start = 0) {
		$this->load->library('session');
		$allowed_pages = $this->session->userdata['allowed_pages'];

		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'proposalslist'))){
			$this->session->set_flashdata('error','Teklifler sayfasına erişim izniniz yoktur!');
			redirect('home');
		}

		$this->load->model('proposal_model');
		$this->load->model('setting_model');

	   	$limit = $this->session->userdata('limit');
	   	$limit2 = (int)$limit;
	   	
		/** Filterler **/
		$data['sort']   = $this->input->get('sort') ? $this->input->get('sort') : 'p.proposal_id';
		$data['sort_order']  = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'desc';

		$filters = array(
			'filter_proposal_id'   		=> $this->input->get('filter_proposal_id'),
			'filter_proposal_name'   	=> $this->input->get('filter_proposal_name'),
			'filter_proposal_total' 	=> $this->input->get('filter_proposal_total'),
			'filter_proposal_status'   	=> $this->input->get('filter_proposal_status'),
			'filter_proposal_date_added'=> $this->input->get('filter_proposal_date_added'),
			'filter_proposal_date_updated'=> $this->input->get('filter_proposal_date_updated'),
			'sort'              		=> $data['sort'],
			'sort_order'        		=> $data['sort_order'],
			'start' 					=> $start,
			'limit'						=> $limit2
		);

		

        $data['filters'] = $filters;

		$data['proposals'] = array();

		/** Total ve proposal **/
		$proposals = $this->proposal_model->getProposals($filters);
		$total_proposals = $this->proposal_model->getTotalProposals($filters);

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
				if ($i < $countNames -1)
					$names .= ',';
			}

			if ($proposal['proposal_status'] == '0') {
				$proposal['proposal_status'] = 'İptal';
			} else if ($proposal['proposal_status'] == '1') {
				$proposal['proposal_status'] = 'Taslak';
			} else if ($proposal['proposal_status'] == '2' ) {
				$proposal['proposal_status'] = 'Gönderildi';
			} else if ($proposal['proposal_status'] == '3' ) {
				$proposal['proposal_status'] = 'Onaylandı';
			} else if ($proposal['proposal_status'] == '4' ) {
				$proposal['proposal_status'] = 'Değişiklik Yapıldı';
			} else if ($proposal['proposal_status'] == '5' ) {
				$proposal['proposal_status'] = 'Red Edildi';
			}

			$data['proposals'][] = array(
				'proposal_id' 	=> $proposal['proposal_id'],
				'proposal_name'	=> $proposal['proposal_name'],
				'proposal_total'	 => $proposal['proposal_total'],
				'proposal_status'	 => $proposal['proposal_status'],
				'proposal_customers' => $names,
				'proposal_date_added' => $proposal['proposal_date_added'],
				'proposal_date_updated' => $proposal['proposal_date_updated'],
			);
		}

		/** Pagination **/
		$data['page_url'] = base_url() . 'proposals';
		$data['pagination'] = $this->getPagination(base_url() . 'proposals/index', $total_proposals, $limit, 3, $_SERVER['QUERY_STRING']);
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
		$data['proposal_total'] = 0;

		if ($proposal_id != -1) {
			$data['proposal'] 	= $this->proposal_model->getProposal($proposal_id);
			$data['proposal_customers'] = $this->proposal_model->getProposalCustomers($proposal_id);
			foreach ($data['proposal_customers'] as $customer) {
				$data['proposal_customer_ids'][] = $customer['customer_id'];
			}

			$data['notes'] 		= $this->proposal_model->getProposalNotes($proposal_id);

			$proposal_products 	= $this->proposal_model->getProposalProducts($proposal_id);

			foreach ($proposal_products as $proposal_product) {
				$price 				= $proposal_product['product_price'];
				$product_quantity 	= $proposal_product['product_quantity'];
				$discount_amount 	= $proposal_product['product_discount'];
				$discount_type 		= $proposal_product['product_discount_type'];

		$filters = array();

		$data['customers'] = $this->proposal_model->getCustomers();

				$total_product_price = $price * $product_quantity;

				if ($discount_type == '1') {
					$total_product_price = $total_product_price - ($total_product_price * $discount_amount / 100);
				} else if ($discount_type == '2') {
					$total_product_price = $total_product_price - $discount_amount;
				}

				$data['proposal_products'][] = array(
					'product_id' 			=> $proposal_product['product_id'],
					'product_quantity' 		=> $proposal_product['product_quantity'],
					'product_price'			=> $proposal_product['product_price'],
					'product_price_type' 	=> $proposal_product['product_price_type'],
					'product_discount' 		=> $proposal_product['product_discount'],
					'product_discount_type' => $proposal_product['product_discount_type'],
					'product_tax_rate'		=> $proposal_product['product_tax_rate'],
					'product_name'			=> $proposal_product['product_name'],
					'product_total'			=> $total_product_price
				);

				$data['proposal_total'] += $total_product_price;
			}
		}

		$data['customers'] = $this->proposal_model->getCustomers(array());
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

	public function validate($data) {
		$errors = array();
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}

	public function getPagination($link, $total_rows, $per_page, $segment, $suffix) {
		$this->load->library('pagination');

	    $pagination = array(
	      'num_links'   => 3,
	      'base_url'    => $link,
	      'total_rows'  => $total_rows,
	      'per_page'    => $per_page,
	      'uri_segment' => $segment,
	      'next_link' => 'Sonraki',
	      'next_tag_open' => '<li>',
	      'next_tag_close' => '</li>',
	      'prev_link' => 'Önceki',
	      'prev_tag_open' => '<li>',
	      'prev_tag_close' => '</li>',
	      'cur_tag_open' => '<li class="active"><a href="#">',
	      'cur_tag_close' => '</a></li>',
	      'first_link' => 'İlk',
	      'first_tag_open' => '<li>',
	      'first_tag_close' => '</li>',
	      'last_link' => 'Son',
	      'last_tag_open' => '<li>',
	      'last_tag_close' => '</li>',
	      'full_tag_open' => ' <div class="dataTables_paginate paging_bootstrap"><ul class="pagination">',
	      'full_tag_close' => '</ul></div>',
	      'num_tag_open' => '<li>',
	      'num_tag_close' => '</li>',
	      'suffix' => '?' . $suffix,
	      'first_url' => $link . '?' . $suffix
	    );

	    $this->pagination->initialize($pagination);
	    return $this->pagination->create_links();
	}
}
?>