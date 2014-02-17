<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerGroups extends CI_Controller {
	var $errors = array();

	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }


	public function index() {
		$this->load->model('customergroup_model');

		$filters = array();

		$data['customer_groups'] = $this->customergroup_model->getCustomerGroups($filters);

		$data['page'] = 'advancedtables';
		$data['subview'] = 'customer_group/customer_group_list';
		$this->load->view('layouts/default', $data);
	}

	public function customerGroup($customer_group_id = -1) {
		$this->load->model('customergroup_model');

		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;

			if ($customer_group_id == -1) {
				$result = $this->customergroup_model->addCustomerGroup($this->input->post());

				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri Grubu başarıyla eklendi');
					redirect('customerGroups');
				}
			} else {
				$result = $this->customergroup_model->updateCustomerGroup($this->input->post(), $customer_group_id);

				if ($result) {
					$this->session->set_flashdata('success', 'Müşteri Grubu başarıyla güncellendi');
					redirect('customerGroups');
				}
			}

		}

		$data['customer_group_id'] = $customer_group_id;

		if ($customer_group_id != -1) {
			$data['customer_group'] = $this->customergroup_model->getCustomerGroup($customer_group_id);
		}

		$data['errors'] = $this->errors;
		$data['page'] = 'forms';
		$data['subview'] = 'customer_group/customer_group';
		$this->load->view('layouts/default', $data);
	}

	public function deleteCustomerGroup($customer_group_id = -1) {
		$this->load->model('customergroup_model');
		$result = $this->customergroup_model->deleteCustomerGroup($customer_group_id);

		if ($result) {
			$this->session->set_flashdata('success', 'Müşteri Grubu başarıyla silindi');
		} else {
			$this->session->set_flashdata('error', 'Müşteri Grubu kaydı silinemedi');
		}

		redirect('customerGroups');

	}

	public function validate($data) {
		$errors = array();

		if (isset($data['customer_group_content']) && strlen(trim($data['customer_group_content'])) < 3)
			$errors[] = 'Müşteri grubu adı alanı minimum 3 karakter olmalıdır';

		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}