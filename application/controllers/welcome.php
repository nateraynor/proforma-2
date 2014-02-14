<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index() {

		  if (isset($this->session->userdata['user_id'])) {
		   redirect('home');
		  } else {
		   redirect('login');
		  } 

		 }
}