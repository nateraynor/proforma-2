<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index() {
		$this->load->model('install_model', '', true);

		if ($this->install_model->checkInstall()) {
			redirect('login');
		} elseif (isset($this->session->userdata['user_id'])) {
			redirect('home');
		} else {
			$data['page'] = 'wizard';
			$data['variable_types'] = $this->install_model->getVariableTypes();
			$data['subview'] = 'install';
			$this->load->view('layouts/installiation', $data);
		}

	}
}