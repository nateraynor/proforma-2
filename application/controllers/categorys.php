<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorys extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
    public function index() {
		$this->load->model('category_model');
		$filters = array();
		$data['categorys'] = $this->category_model->getCategory($filters);
		$data['menu'] = 'categorys';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'categorys/category_list';
		$data['parentcategorys'] = $this->category_model->getCategory($filters);
		$data['errors'] = $this->errors;
		$this->load->view('layouts/default', $data);
	}
	public function category($category_id = -1) {
		$this->load->model('category_model');
		$filters = array();
		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;
			if ($category_id == -1) {
				$result = $this->category_model->addCategory($this->input->post());
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla eklendi');
					redirect('categorys');
				}
			} else {
				$result = $this->category_model->updateCategory($this->input->post(), $category_id);
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla güncellendi');
					redirect('categorys');
				}
			}
		}
		if ($category_id != -1)
			$data['category'] = $this->category_model->getCategorys($category_id);
		$data['category_id'] = $category_id;
		$data['menu'] = 'categorys';
		$data['page'] = 'forms';
		$data['subview'] = 'categorys/category';
		$data['categorys'] = $this->category_model->getCategory($filters);
		$this->load->view('layouts/default', $data);
	}
	public function deleteCategory($category_id) {
		$this->load->model('category_model');
		$result = $this->category_model->deleteCategory($category_id);
		if ($result)
			$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla silindi!');
		else
			$this->session->set_flashdata('error', 'Ürün Kategorisi silinemedi!');
		redirect('categorys');
	}
	public function validate($data) {
		$errors = array();
		if (isset($data['category_name']) && strlen(trim($data['category_name'])) < 3)
			$errors[] = 'Müşteri adı alanı minimum 3 karakter olmalıdır';
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}
?>