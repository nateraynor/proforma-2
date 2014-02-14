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



		if ($this->input->post() && $this->validate($this->input->post())) {

			$result = false;



			if ($user_id == -1) {

					$result = $this->user_model->addUser($this->input->post());
		
					$this->session->set_flashdata('warning', 'Kullanıcı başarıyla eklendi');
					redirect('users/user');


				if ($result) {


					redirect('users');

				}

			} else {

				$result = $this->user_model->updateUser($this->input->post(), $user_id);

				var_dump($result);

				if ($result) {

					$this->session->set_flashdata('success', 'Kullanıcı başarıyla güncellendi');

					redirect('users');

				}

			}

		}



		if ($user_id != -1)

			$data['user'] = $this->user_model->getUser($user_id);



		$data['user_id'] = $user_id;

		$data['menu'] = 'users';

		$data['page'] = 'forms';

		$data['subview'] = 'user/user';



		$this->load->view('layouts/default', $data);

	}



	public function validate($data) {

		$errors = array();

		if(isset($data['user_email']) && (!$this->user_model->checkUserEmail($data['user_email'])))
			
			$errors[] = 'Kullanıcı E-postası daha kullanılmıştır';


		if (isset($data['user_username']) && strlen(trim($data['user_username'])) < 3)

			$errors[] = 'Kullanıcı Rumuz alanı minimum 3 karakter olmalıdır';



		if (isset($data['user_name']) && strlen(trim($data['user_name'])) < 3)

			$errors[] = 'Kullanıcı Ad - Soyad alanı minimum 3 karakter olmalıdır';



		if (!empty($errors)) {

			$this->errors = $errors;

			return false;

		} else {

			return true;

		}

	}

}