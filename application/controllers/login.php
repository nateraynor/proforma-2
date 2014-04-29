<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	var $errors = array();

	public function __construct() {
    	parent::__construct();
    }

	public function index() {
		$this->load->model('setting_model');

		if (isset($this->session->userdata['user_id']))
			redirect('home');
		if ($this->input->post() && $this->validate($this->input->post())) {
			$this->load->model('login_model');
			$result = $this->login_model->sign_in($this->input->post());
			if (empty($result))
				$this->errors[] = 'Hatalı kullanıcı adı ve ya şifre';
			else {
				$this->session->set_userdata('user_id', $result['user_id']);
				$this->session->set_userdata('username', $result['user_username']);
				$this->session->set_userdata('allowed_pages', $result['user_allowed_pages']);
				$this->session->set_userdata('name', $result['user_name']);
				$this->session->set_userdata('surname', $result['user_surname']);
				$this->session->set_userdata('email', $result['user_email']);
				$this->session->set_userdata('limit', '10');
				redirect('home');
			}
		}

		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		$data['errors'] = $this->errors;
		$data['subview'] = 'login/login';
		$this->load->view('layouts/login', $data);
	}
	public function logout() {
        $this->session->sess_destroy();

        redirect('login', 'refresh');
	}
	public function validate($data) {
		$errors = array();
		if (isset($data['username']) && strlen(trim($data['username'])) < 5)
			$errors[] = 'Kullanıcı adı alanı minimum 5 karakter olmalıdır';

		if (isset($data['password']) && strlen(trim($data['password'])) < 5)
			$errors[] = 'Şifre alanı minimum 5 karakter olmalıdır';
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}