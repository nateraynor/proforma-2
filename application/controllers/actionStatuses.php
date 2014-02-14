<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ActionStatuses extends CI_Controller {
	var $errors = array();
	
	public function __construct() {		
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }


	public function index() {
		$this->load->model('actionstatus_model');

		$filters = array();

		$data['action_statuses'] = $this->actionstatus_model->getactionStatuses($filters);

		$data['page'] = 'advancedtables';
		$data['subview'] = 'action_status/action_status_list';
		$this->load->view('layouts/default', $data);
	}	

	public function actionStatus($action_status_id = -1) {
		$this->load->model('actionstatus_model');

		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;

			if ($action_status_id == -1) {
				$result = $this->actionstatus_model->addactionStatus($this->input->post());

				if ($result) {
					$this->session->set_flashdata('success', 'İşlem Grubu başarıyla eklendi');
					redirect('actionStatuses');
				}
			} else {
				$result = $this->actionstatus_model->updateactionStatus($this->input->post(), $action_status_id);

				if ($result) {
					$this->session->set_flashdata('success', 'İşlem Grubu başarıyla güncellendi');
					redirect('actionStatuses');
				}
			}

		}

		$data['action_status_id'] = $action_status_id;

		if ($action_status_id != -1) {
			$data['action_status'] = $this->actionstatus_model->getactionStatus($action_status_id);
		}

		$data['errors'] = $this->errors;
		$data['page'] = 'forms';
		$data['subview'] = 'action_status/action_status';
		$this->load->view('layouts/default', $data);
	}

	public function deleteactionStatus($action_status_id = -1) {
		$this->load->model('actionstatus_model');
		$result = $this->actionstatus_model->deleteactionStatus($action_status_id);

		if ($result) {
			$this->session->set_flashdata('success', 'İşlem Grubu başarıyla silindi');
		} else {
			$this->session->set_flashdata('error', 'İşlem Grubu kaydı silinemedi');
		}

		redirect('actionStatuses');

	}

	public function validate($data) {
		$errors = array();

		if (isset($data['action_status_content']) && strlen(trim($data['action_status_content'])) < 3)
			$errors[] = 'İşlem grubu adı alanı minimum 3 karakter olmalıdır';
		
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}