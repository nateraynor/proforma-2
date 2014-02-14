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

		
		$data['categorys'] = $this->category_model->getCategorys($filters);


		$data['menu'] = 'categorys';

		$data['page'] = 'advancedtables';

		$data['subview'] = 'categorys/category_list';

		

		$this->load->view('layouts/default', $data);

	}	

	public function category($category_id = -1) {

		$this->load->model('category_model');




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
			$data['category'] = $this->category_model->getCategory($category_id);




		$data['category_id'] = $category_id;

		$data['menu'] = 'categorys';

		$data['page'] = 'forms';

		$data['subview'] = 'categorys/category';



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
}
?>