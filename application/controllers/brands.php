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

		
		$data['brands'] = $this->brand_model->getBrands($filters);

		$data['menu'] = 'brands';

		$data['page'] = 'advancedtables';

		$data['subview'] = 'brands/brand_list';

		//$data['parentcategorys'] = $this->category_model->getCategory($filters);
		
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
			$data['brand'] = $this->brand_model->getBrand($brand_id);
		

		$data['brand_id'] = $brand_id;

		$data['menu'] = 'brands';

		$data['page'] = 'forms';

		$data['subview'] = 'brands/brand';

		$this->load->view('layouts/default', $data);

	}



	public function deleteBrand($brand_id) {

		$this->load->model('brand_model');



		$result = $this->brand_model->deleteBrand($brand_id);



		if ($result)

			$this->session->set_flashdata('success', 'Ürün Marka başarıyla silindi!');

		else

			$this->session->set_flashdata('error', 'Ürün Marka silinemedi!');



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