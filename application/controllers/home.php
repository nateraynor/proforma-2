<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }

	public function index() {
		$this->load->model('timeline_model');
		$this->load->model('report_model');
		$this->load->model('setting_model');

		$data['metaInfo'] = $this->setting_model->getSetting('meta');	
		$data['total_customers'] = $this->report_model->getTotalCustomers();
		$data['total_users'] = $this->report_model->getTotalUsers();
		$data['total_products'] = $this->report_model->getTotalProducts();
		$data['total_proposals'] = $this->report_model->getTotalProposals();

		$data['timeline'] = $this->timeline_model->getActivities();
		$data['name'] = $this->session->userdata['name'];
		$data['menu'] = 'dashboard';
		$data['page'] = 'dashboard';
		$data['subview'] = 'common/dashboard';
		$this->load->view('layouts/default', $data);
	}
	public function updateColumnDisplayAjax($column_name) {
		$this->load->model('config_model');
		$this->config_model->updateColumnDisplay($column_name);
	}
}