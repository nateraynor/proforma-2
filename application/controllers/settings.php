<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
    public function templates() {
    	$this->load->model('setting_model');
    	$templates = $this->setting_model->getTemplates();
    }
}