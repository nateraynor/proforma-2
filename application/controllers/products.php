<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
    public function index() {
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');

		$filters = array();
		$data['products'] = $this->product_model->getProducts($filters);
		$data['categories'] = $this->category_model->getCategory($filters);
		$data['brands']  = $this->brand_model->getBrands($filters);

		$data['menu'] = 'products';
		$data['page'] = 'advancedtables';
		$data['subview'] = 'products/product_list';
	
		$data['errors'] = $this->errors;
		$this->load->view('layouts/default', $data);
	}
	public function product($product_id = -1) {
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');

		$filters = array();

		if ($this->input->post() && $this->validate($this->input->post())) {
			   $result = false;
			   $config['upload_path'] = './uploads/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '500';
			   $config['max_width']  = '1024';
			   $config['max_height']  = '768';

			   $this->load->library('upload', $config);

				if ($product_id == -1) {

					if ($_FILES['product_image']['name'] != '' && !$this->upload->do_upload('product_image')){
						$this->errors[] = $this->upload->display_errors();	
					} else {
						$insert_data = $this->input->post();

						if($_FILES['product_image']['name'] != '')

							$upload_data = $this->upload->data();
						else
							$upload_data['file_name'] = NULL;
							$insert_data['product_image'] = $upload_data['file_name'];
					
					$result = $this->product_model->addProduct($insert_data);
					    					    
					}

					if ($result) {
						$this->session->set_flashdata('success', 'Ürün başarıyla eklendi');
						redirect('products');
					}
				} else {
					if($_FILES['product_image']['name'] != '' && !$this->upload->do_upload('product_image')){
						$this->errors[] = $this->upload->display_errors();
					} else {
						$update_data = $this->input->post();

						if($_FILES['product_image']['name'] != '')

							$upload_data = $this->upload->data();
						else
							$upload_data['file_name'] = NULL;
							$update_data['product_image'] = $upload_data['file_name'];
				
					$result = $this->product_model->updateProduct($update_data, $product_id);		

					}

					if ($result) {
						$this->session->set_flashdata('success', 'Ürün başarıyla güncellendi');
						redirect('products');
					}
				}
		}

		if ($product_id != -1)
			$data['product'] = $this->product_model->getProduct($product_id);
		$data['product_id'] = $product_id;
		$data['menu'] = 'products';
		$data['page'] = 'forms';
		$data['subview'] = 'products/product';
		$data['categories'] = $this->category_model->getCategory($filters);
		$data['brands']  = $this->brand_model->getBrands($filters);

		$data['products'] = $this->product_model->getProducts($filters);
		$this->load->view('layouts/default', $data);
	}
	public function deleteProduct($product_id) {
		$this->load->model('product_model');
		$result = $this->product_model->deleteProduct($product_id);

		if ($result)
			$this->session->set_flashdata('success', 'Ürün başarıyla silindi!');
		else
			$this->session->set_flashdata('error', 'Ürün silinemedi!');
		redirect('products');
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