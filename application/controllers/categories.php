<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
    public function index() {
		$this->load->model('category_model');
		$this->load->model('setting_model');

		$filters = array();
		
		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'categorieslist'))){
			$this->session->set_flashdata('error','Kategoriler sayfasına erişim izniniz yoktur !');
			redirect('home');
		}

		$data['metaInfo'] = $this->setting_model->getSetting('meta');	
		$data['categories'] = $this->category_model->getCategory($filters);
		$data['menu'] = 'products';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'categories/category_list';
		$data['parentcategories'] = $this->category_model->getCategory($filters);
		$data['errors'] = $this->errors;
		$this->load->view('layouts/default', $data);
	}
	public function category($category_id = -1) {
		$this->load->model('category_model');
		$this->load->model('setting_model');

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'categories/category'))){
			$this->session->set_flashdata('error','Kategori işlemleri sayfasına erişim izniniz yoktur !');
			redirect('home');
		}

		$filters = array();
		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;
			if ($category_id == -1) {
				$result = $this->category_model->addCategory($this->input->post());
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla eklendi');
					redirect('categories');
				}
			} else {
				$result = $this->category_model->updateCategory($this->input->post(), $category_id);
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla güncellendi');
					redirect('categories');
				}
			}
		}
		if ($category_id != -1)
			$data['category'] = $this->category_model->getCategories($category_id);

		$data['metaInfo'] = $this->setting_model->getSetting('meta');	
		$data['category_id'] = $category_id;
		$data['menu'] = 'products';
		$data['page'] = 'forms';
		$data['subview'] = 'categories/category';
		$data['categories'] = $this->category_model->getCategory($filters);
		$this->load->view('layouts/default', $data);
	}
	public function deleteCategory($category_id) {
		$this->load->model('category_model');
		$subcategory = $this->category_model->getSubCategory($category_id);
		$products = $this->category_model->getProducts($category_id);
		$categories_name = array();
			foreach ($subcategory as $category) {
				 $categories_name[] = $category['category_name'];
			}
			$names = '';
			$countnames = count($names);
			for ($i=0; $i<= $countnames ;$i++) { 
				$names .= $categories_name[$i];
					if($i != $countnames)
						$names .= ', ';
			}
		
		if(!empty($products)){
			$this->session->set_flashdata('error', 'Kategoriye ait ürün var !');
		}elseif($subcategory){
			$this->session->set_flashdata('error', 'Kategoriye ait (' . $names . ') alt kategorileri var !');
		}else{
			$result = $this->category_model->deleteCategory($category_id);
			if ($result)
				$this->session->set_flashdata('success', 'Ürün Kategorisi başarıyla silindi!');
			else
				$this->session->set_flashdata('error', 'Ürün Kategorisi silinemedi!');
		}
			
		redirect('categories');
	
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