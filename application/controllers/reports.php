<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
	var $errors = array();

	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');

    }

	public function index() {
		$this->load->model('report_model');

		$data['total_actions'] = $this->report_model->getTotalActions();
		$data['total_customers'] = $this->report_model->getTotalCustomers();
		$data['total_users'] = $this->report_model->getTotalUsers();
		$data['menu'] = 'reports';
		$data['page'] = 'dashboard';
		$data['subview'] = 'report/reports';

		$this->load->view('layouts/default', $data);
	}

	public function getCustomerStatistics($type = 'monthly') {
		$this->load->model('report_model');

		$results = $this->report_model->getCustomerStatistics($type);

		echo json_encode($results);
	}
}