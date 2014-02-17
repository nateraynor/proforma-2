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
    	$data['templates'] = $this->setting_model->getTemplates();
        $data['menu'] = 'settings';
        $data['page'] = 'forms';
        $data['subview'] = 'settings/template';
        $this->load->view('layouts/default', $data);
    }

    public function saveTemplate($template_id) {
        $this->load->model('setting_model');

        $result = $this->setting_model->saveTemplate($this->input->post(), $template_id);

        echo $result;
    }
}