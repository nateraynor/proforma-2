<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customers extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
	public function index() {
		$this->load->model('customer_model');
		$filters = array();
		$data['customers'] = $this->customer_model->getCustomers($filters);
		$data['menu'] = 'customers';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'customers/customer_list';
		$this->load->view('layouts/default', $data);
	}
	public function customer($customer_id = -1) {
		$this->load->model('customer_model');
		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;
			if ($customer_id == -1) {
				$result = $this->customer_model->addCustomer($this->input->post());
				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri başarıyla eklendi');
					redirect('customers');
				}
			} else {
				$result = $this->customer_model->updateCustomer($this->input->post(), $customer_id);
				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri başarıyla güncellendi');
					redirect('customers');
				}
			}
		}
		if ($customer_id != -1)
			$data['customer'] = $this->customer_model->getCustomer($customer_id);
		$data['customer_id'] = $customer_id;
		$data['menu'] = 'customers';
		$data['page'] = 'forms';
		$data['subview'] = 'customers/customer';
		$this->load->view('layouts/default', $data);
	}
	public function deleteCustomer($customer_id) {
		$this->load->model('customer_model');
		$result = $this->customer_model->deleteCustomer($customer_id);
		if ($result)
			$this->session->set_flashdata('success', 'Müşteri kaydı başarıyla silindi!');
		else
			$this->session->set_flashdata('error', 'Müşteri kaydı silinemedi!');
		redirect('customers');
	}
	public function excelOutput() {
		$this->load->library('excel');
		$this->load->model('customer_model');
		$results = $this->customer_model->getCustomersForExcel();
        $this->excel->to_excel($results, 'users-excel', 'Kullanıcılar');
	}

	public function validate($data) {
		$errors = array();
		if (isset($data['customer_name']) && strlen(trim($data['customer_name'])) < 3)
			$errors[] = 'Müşteri adı alanı minimum 3 karakter olmalıdır';
		if (isset($data['customer_surname']) && strlen(trim($data['customer_surname'])) < 3)
			$errors[] = 'Müşteri soyadı alanı minimum 3 karakter olmalıdır';
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}