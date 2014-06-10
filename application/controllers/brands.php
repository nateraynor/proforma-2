<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }

    	public function index() {
		$this->load->model('brand_model');
		$this->load->model('setting_model');
		$filters = array();
		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'brandslist'))){
			$this->session->set_flashdata('error','Markalar sayfasına erişim izniniz yoktur !');
			redirect('home');
		}

		$data['metaInfo'] = $this->setting_model->getSetting('meta');	
		$data['brands'] = $this->brand_model->getBrands($filters);
		$data['menu'] = 'products';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'brands/brand_list';
		//$data['parentcategories'] = $this->category_model->getCategory($filters);

		$data['errors'] = $this->errors;
		$this->load->view('layouts/default', $data);
	}
	public function brand($brand_id = -1) {
		$this->load->model('brand_model');
		$this->load->model('setting_model');
		$filters = array();

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'brands/brand'))){
			$this->session->set_flashdata('error','Marka işlemlerine erişim izniniz yoktur !');
			redirect('home');
		}


		if ($this->input->post() && $this->validate($this->input->post())) {
			$result = false;
			if ($brand_id == -1) {
				$result = $this->brand_model->addBrand($this->input->post());
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün / Hizmet marka başarıyla eklendi.');
					redirect('brands');
				}
			} else {
				$result = $this->brand_model->updateBrand($this->input->post(), $brand_id);
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün / Hizmet marka başarıyla güncellendi.');
					redirect('brands');
				}
			}
		}

		if ($brand_id != -1)
			$data['brand'] = $this->brand_model->getBrand($brand_id);
		
		$data['metaInfo'] = $this->setting_model->getSetting('meta');	
		$data['brand_id'] = $brand_id;
		$data['menu'] = 'products';
		$data['page'] = 'forms';
		$data['subview'] = 'brands/brand';
		$this->load->view('layouts/default', $data);
	}

	public function deleteBrand($brand_id) {
		$this->load->model('brand_model');

		$products = $this->brand_model->getProducts($brand_id);

		if(!empty($products)){
			$this->session->set_flashdata('error', ' Markaya ait ürün / hizmet var !');
		}else{
			$result = $this->brand_model->deleteBrand($brand_id);

			if ($result)
				$this->session->set_flashdata('success', 'Ürün / Hizmet marka başarıyla silindi.');
			else
				$this->session->set_flashdata('error', 'Ürün / Hizmet marka silinemedi!');
		}
			

		redirect('brands');
	}

	public function validate($data) {
		$errors = array();
		if (!empty($errors)) {
			$this->errors = $errors;
			return false;
		} else {
			return true;
		}
	}
}
?>