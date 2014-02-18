<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
	public function index() {
		$this->load->model('user_model');
		$data['users'] = $this->user_model->getUsers();
		$data['name'] = $this->session->userdata['name'];
		$data['menu'] = 'users';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'user/user_list';
		$this->load->view('layouts/default', $data);
	}
	public function user($user_id = -1) {
		$this->load->model('user_model');
		$validate_data =  $this->input->post();
		$validate_data['user_id'] = $user_id;
		if ($this->input->post() && $this->validate($validate_data)) {
			$result = false;
			if ($user_id == -1) {
					$result = $this->user_model->addUser($this->input->post());

					$this->session->set_flashdata('warning', 'Kullanıcı başarıyla eklendi');
					redirect('users');
				if ($result) {
					redirect('users');
				}
			} else {
				$result = $this->user_model->updateUser($this->input->post(), $user_id);
				$this->session->set_flashdata('success', 'Kullanıcı başarıyla güncellendi');
				redirect('users');
			}
		}
		if ($user_id != -1)
			$data['user'] = $this->user_model->getUser($user_id);
		$data['user_id'] = $user_id;
		$data['menu'] = 'users';
		$data['errors'] = $this->errors;
		$data['page'] = 'forms';
		$data['subview'] = 'user/user';
		$this->load->view('layouts/default', $data);
	}
	public function validate($data) {
		$errors = array();
		$user_id = $data['user_id'];
		$user_email = $this->user_model->getUserEmail($user_id);
		$user_username = $this->user_model->getUsername($user_id);
		if (isset($data['user_username']) && strlen(trim($data['user_username'])) < 3)
			$errors[] = 'Kullanıcı Rumuz alanı minimum 3 karakter olmalıdır';
		if (isset($data['user_name']) && strlen(trim($data['user_name'])) < 3)
			$errors[] = 'Kullanıcı Ad - Soyad alanı minimum 3 karakter olmalıdır';

		if($data['user_id'] != -1)
			if($data['user_username'] != $user_username)
				if(isset($data['user_username']) && (!$this->user_model->checkUsername($data['user_username'])))
					$errors[] = 'Kullanıcı Adı daha önce kullanılmıştır';
		if($data['user_id'] == -1)
			if(isset($data['user_username']) && (!$this->user_model->checkUsername($data['user_username'])))
					$errors[] = 'Kullanıcı Adı daha önce kullanılmıştır';

		if($data['user_id'] != -1)
			if($data['user_email'] != $user_email )
				if(isset($data['user_email']) && (!$this->user_model->checkUserEmail($data['user_email'])))
					$errors[] = 'Kullanıcı E-postası daha kullanılmıştır';

		if($data['user_id'] == -1)
			if(isset($data['user_email']) && (!$this->user_model->checkUserEmail($data['user_email'])))
				$errors[] = 'Kullanıcı E-postası daha kullanılmıştır';



		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
	public function userChangePassword($user_id){
		$this->load->model('user_model');
		$user = $this->user_model->getUser($user_id);

		if($this->input->post()){
			$data['user'] = $this->input->post();
	
			if(md5($data['user']['past_pass']) != $user['user_password']){
				$this->session->set_flashdata('errorPass', 'Eski Şifreyle uyuşmamaktadır');		

				redirect('users/user/'.$user_id);
			}else if($data['user']['new_pass'] != $data['user']['repeat_new_pass']){
				$this->session->set_flashdata('errorPass', 'Eski Şifreyle uyuşmamaktadır');	

				redirect('users/user/'.$user_id);
			}else{
				$result = $this->user_model->updateUserPassword($this->input->post(), $user_id);
				$this->session->set_flashdata('success', 'Kullanıcı şifersi başarıyla güncellendi');
				redirect('users');
			}

		}
	}
	public function deleteUser($user_id){
		$this->load->model('user_model');
		$result = $this->user_model->deleteUser($user_id);
		if($result)
			$this->session->set_flashdata('success' ,'Kullanıcı kaydı başarıyla silindi!');
		else
			$this->session->set_flashdata('error', 'Kullanıcı kaydı silinemedi!');
		redirect('users');
	}
}