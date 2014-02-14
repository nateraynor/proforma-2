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


		$filters = array();

		
		$data['brands'] = $this->brand_model->getBrand($filters);

		$data['menu'] = 'brands';

		$data['page'] = 'advancedtables';

		$data['subview'] = 'brands/brand_list';
		
		$data['errors'] = $this->errors;

		$this->load->view('layouts/default', $data);

	}	

	public function brand($brand_id = -1) {

		$this->load->model('brand_model');

		$filters = array();



		if ($this->input->post() && $this->validate($this->input->post())) {

			$result = false;

			if ($brand_id == -1) {

				$result = $this->brand_model->addBrand($this->input->post());

				if ($result) {

					$this->session->set_flashdata('success', 'Ürün Marka başarıyla eklendi');

					redirect('brands');

				}

			} else {

				$result = $this->brand_model->updateBrand($this->input->post(), $brand_id);

				if ($result) {

					$this->session->set_flashdata('success', 'Ürün Marka başarıyla güncellendi');

					redirect('brands');

				}

			}

		}



		if ($brand_id != -1)
			$data['brand'] = $this->brand_model->getBrands($brand_id);
		

		$data['brand_id'] = $_id;

		$data['menu'] = 'categorys';

		$data['page'] = 'forms';

		$data['subview'] = 'categorys/category';

		$data['categorys'] = $this->brand_model->getCategory($filters);

		$this->load->view('layouts/default', $data);

	}



	public function deleteCategory($category_id) {

		$this->load->model('brand_model');



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