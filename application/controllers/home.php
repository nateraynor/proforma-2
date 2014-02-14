<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	var $errors = array();

	

	public function __construct() {		

    	parent::__construct();



        if (!isset($this->session->userdata['user_id']))

        	redirect('login');



    }





	public function index() {

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