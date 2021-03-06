<?php if ( ! defined('BASEPATH')) exit('No direct script parent::__construct();access allowed');
class Customers extends CI_Controller {
	var $errors = array();

	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
	public function index($start=0) {
    	$this->load->library('session');
		$this->load->model('customer_model');
		$this->load->model('setting_model');

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'customerslist'))){
			$this->session->set_flashdata('error','Müşteriler sayfasına erişim izniniz yoktur!');
			redirect('home');
		}

		$limit = $this->session->userdata('limit');

		/** Filterler **/
		$data['sort']   = $this->input->get('sort') ? $this->input->get('sort') : 'c.customer_id';
		$data['sort_order']  = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'desc';

		$filters = array(
			'filter_customer_id'   		=> $this->input->get('filter_customer_id'),
			'filter_customer_name'   	=> $this->input->get('filter_customer_name'),
			'filter_customer_surname' 	=> $this->input->get('filter_customer_surname'),
			'filter_customer_email' 	=> $this->input->get('filter_customer_email'),
			'filter_customer_status'   	=> $this->input->get('filter_customer_status'),
			'sort'              		=> $data['sort'],
			'sort_order'        		=> $data['sort_order'],
			'start' 					=> $start,
			'limit'						=> $limit
		);

        $data['filters'] = $filters;
		/** Total ve proposal **/
		$data['customers'] = $this->customer_model->getCustomers($filters);

		$total_customers = $this->customer_model->getTotalCustomers($filters);

		$data['page_url'] = base_url() . 'customers';
		$data['excel_url'] = base_url() . 'customers/excelOutput';

		$data['pagination'] = $this->getPagination(base_url() . 'customers/index', $total_customers, $limit, 3, $_SERVER['QUERY_STRING']);
		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['menu'] = 'customers';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'customers/customer_list';
		$this->load->view('layouts/default', $data);
	}
	public function customer($customer_id = -1) {
		$this->load->model('customer_model');
		$this->load->model('setting_model');

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'customers/customer'))){
			$this->session->set_flashdata('error','Müşteri işlemleri sayfasına erişim izniniz yoktur!');
			redirect('home');
		}
		if ($customer_id != -1)
			$data['customer'] = $this->customer_model->getCustomer($customer_id);

		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;
		

		
		   $config['upload_path'] = './uploads/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';

		   $this->load->library('upload', $config);

			if ($customer_id == -1) {
				if ($_FILES['customer_company_image']['name'] != '' && !$this->upload->do_upload('customer_company_image')){
					$this->errors[] = $this->upload->display_errors();

				} else {
				
					$insert_data = $this->input->post();
					
					if($_FILES['customer_company_image']['name'] != '')
						$upload_data = $this->upload->data();
					else
						$upload_data['file_name'] = NULL;

				$insert_data['customer_company_image'] = $upload_data['file_name'];
				$result = $this->customer_model->addCustomer($insert_data);
				}
				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri başarıyla eklendi.');
					redirect('customers');
				}

			} else {
				if($_FILES['customer_company_image']['name'] != '' && !$this->upload->do_upload('customer_company_image')){
					$this->errors[] = $this->upload->display_errors();
				} else {
					$update_data = $this->input->post();
					
					if ($_FILES['customer_company_image']['name'] != '')
						$upload_data = $this->upload->data();
					else
						$upload_data['file_name'] = $data['customer']['customer_company_image'];

				$update_data['customer_company_image'] = $upload_data['file_name'];

				$result = $this->customer_model->updateCustomer($update_data, $customer_id);
				}
				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri başarıyla güncellendi.');
					redirect('customers');
				}
			}

		}
	

		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['customer_id'] = $customer_id;
		$data['menu'] = 'customers';
		$data['page'] = 'forms';
		$data['subview'] = 'customers/customer';
		$this->load->view('layouts/default', $data);
	}

	public function addCustomerAjax(){
		$this->load->model('customer_model');
		$customer_name = $this->input->post('customer_name');
		$customer_surname = $this->input->post('customer_surname');
		$customer_email = $this->input->post('customer_email');
		$customer_company = $this->input->post('customer_company');

		if (empty($customer_name) || empty($customer_surname) || empty($customer_email) || empty($customer_company))
	      {
	        $msg = 'Lütfen alanları doldurunuz';
	      }
         $data = array($customer_name,$customer_surname,$customer_email,$customer_company);
         $customer_id = $this->customer_model->addCustomerAjax($data);
        if ($customer_id)
          {
            $msg = 'Müşteri başarıyla eklendi. ';
          }
        else
          {
            $msg = 'Müşteri eklenemedi. ';
          }
	        echo preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($customer_id));
	}

	public function deleteCustomer($customer_id) {
		$this->load->model('customer_model');
		$result = $this->customer_model->deleteCustomer($customer_id);
		if ($result)
			$this->session->set_flashdata('success', 'Müşteri kaydı başarıyla silindi.');
		else
			$this->session->set_flashdata('error', 'Müşteri kaydı silinemedi!');
		redirect('customers');
	}
	public function excelOutput() {
		$this->load->library('excel');
		$this->load->model('customer_model');

		$filters = array(
			'filter_customer_id'   		=> $this->input->get('filter_customer_id'),
			'filter_customer_name'   	=> $this->input->get('filter_customer_name'),
			'filter_customer_surname' 	=> $this->input->get('filter_customer_surname'),
			'filter_customer_email' 	=> $this->input->get('filter_customer_email'),
			'filter_customer_status'   	=> $this->input->get('filter_customer_status'),
		);
		
		$results = $this->customer_model->getCustomersForExcel($filters);
        $this->excel->to_excel($results, 'users-excel', 'Müşteriler');
	}

	public function validate($data) {
		$errors = array();
		if (isset($data['customer_name']) && strlen(trim($data['customer_name'])) < 3)
			$errors[] = 'Müşteri adı alanı minimum 3 karakter olmalıdır !';
		if (isset($data['customer_surname']) && strlen(trim($data['customer_surname'])) < 3)
			$errors[] = 'Müşteri soyadı alanı minimum 3 karakter olmalıdır !';
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