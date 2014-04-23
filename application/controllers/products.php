<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }

    public function index($start = 0 , $limit = 1) {
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		$this->load->model('setting_model');

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages,'productslist'))){
			$this->session->set_flashdata('error','Ürünler sayfasına erişim izniniz yoktur!');
			redirect('home');

		}

		/** Filterler **/
		$data['sort']   = $this->input->get('sort') ? $this->input->get('sort') : 'p.product_id';
		$data['sort_order']  = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'desc';

		$filters = array(
			'filter_product_id'   		=> $this->input->get('filter_product_id'),
			'filter_product_name'   	=> $this->input->get('filter_product_name'),
			'filter_category_name'   	=> $this->input->get('filter_category_name'),
			'filter_brand_name'   		=> $this->input->get('filter_brand_name'),
			'filter_product_price' 	    => $this->input->get('filter_product_price'),
			'filter_product_status'   	=> $this->input->get('filter_product_status'),
			'sort'              		=> $data['sort'],
			'sort_order'        		=> $data['sort_order'],
			'start' 					=> $start,
			'limit'						=> $limit
		);

        $data['filters'] = $filters;

		/** Total ve product **/
		$data['products'] = $this->product_model->getProducts($filters);
		$total_products = $this->product_model->getTotalProducts($filters);
		/**Pagination*/
		$data['page_url'] = base_url() . 'products';
		$data['pagination'] = $this->getPagination(base_url() . 'products/index', $total_products, $limit, 3, $_SERVER['QUERY_STRING']);
		//public function getPagination($link, $total_rows, $per_page, $segment, $suffix) {
		
		$data['metaInfo'] = $this->setting_model->getSetting('meta');
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
		$this->load->model('setting_model');

		$filters = array();

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if (!empty($allowed_pages) && (!strstr($allowed_pages, 'products/product'))) {
			$this->session->set_flashdata('error','Ürün işlmeleri sayfasına erişim izniniz yoktur!');
			redirect('home');
		}

		$data['product_files'] = array();

		if ($product_id != -1) {
			$data['product'] = $this->product_model->getProduct($product_id);
			$data['product_files'] = $this->product_model->getProductFiles($product_id);
		}

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

					if ($_FILES['product_image']['name'] != '')
						$upload_data = $this->upload->data();
					else
						$upload_data['file_name'] = $data['product']['product_image'];

					$update_data['product_image'] = $upload_data['file_name'];
					$result = $this->product_model->updateProduct($update_data, $product_id);
				}
				if ($result) {
					$this->session->set_flashdata('success', 'Ürün başarıyla güncellendi');
					redirect('products');
				}
			}
		}

		$data['tax_rates'] = $this->setting_model->getSetting('tax_rates');
		$data['categories'] = $this->category_model->getCategory($filters);
		$data['brands']  = $this->brand_model->getBrands($filters);
		$data['product_id'] = $product_id;
		$data['metaInfo'] = $this->setting_model->getSetting('meta');


		$data['menu'] = 'products';
		$data['page'] = 'forms';
		$data['subview'] = 'products/product';
		$this->load->view('layouts/default', $data);
	}

	public function fileUpload($product_id) {
		$this->load->model('product_model');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|doc|xls|xlsx|pdf|ppt|pptx|docx|docm|xlm|xlsm|sql';
		$config['max_size'] = '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$targetPath = './uploads/';
			$targetFile = $targetPath . time() . $_FILES['file']['name'];
			move_uploaded_file($tempFile, $targetFile);

	        $result = $this->product_model->addProductFile(time() . $_FILES['file']['name'], $product_id);
	    }

	    echo $result;
	}

	public function removeFile($file_id) {
		$this->load->model('product_model');

		$file_path = $this->product_model->removeFile($file_id);

		unlink($file_path);

		return $file_path;
	}

	public function excelOutput() {
		$this->load->library('excel');
		$this->load->model('product_model');
		$results = $this->product_model->getProductsForExcel();
        $this->excel->to_excel($results, 'products-excel', 'Ürünler');
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

	public function getProductsAjax($value) {
		$this->load->model('product_model');

		$filters = array(
			'filter_name' => $value,
			'limit'		  => 10
		);

		$products = $this->product_model->getProducts($filters);

		foreach ($products as $product) {
			echo '<a href="#" class="autocomplete-result" onclick="autocompleteResult(this, ' . $product['product_id'] . ', ' . $product['product_price'] . ', ' . $product['product_tax_rate'] . '); return false;">' . $product['product_name'] . '</a>';
		}

	}

	public function getProductAjax($product_id) {
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		$filters = array();

		$data['product_files'] = array();

		if ($product_id != -1) {
			$data['product'] = $this->product_model->getProduct($product_id);
			$data['product_files'] = $this->product_model->getProductFiles($product_id);
			$data['brand'] = $this->brand_model->getBrand($data['product']['brand_id']);
		}

		echo json_encode($data);
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

	public function getPagination($link, $total_rows, $per_page, $segment, $suffix) {
		$this->load->library('pagination');

	    $pagination = array(
	      'num_links'   => 3,
	      'base_url'    => $link,
	      'total_rows'  => $total_rows,
	      'per_page'    => $per_page,
	      'uri_segment' => $segment,
	      'next_link' => 'Sonraki',
	      'next_tag_open' => '<li>',
	      'next_tag_close' => '</li>',
	      'prev_link' => 'Önceki',
	      'prev_tag_open' => '<li>',
	      'prev_tag_close' => '</li>',
	      'cur_tag_open' => '<li class="active"><a href="#">',
	      'cur_tag_close' => '</a></li>',
	      'first_link' => 'İlk',
	      'first_tag_open' => '<li>',
	      'first_tag_close' => '</li>',
	      'last_link' => 'Son',
	      'last_tag_open' => '<li>',
	      'last_tag_close' => '</li>',
	      'full_tag_open' => ' <div class="dataTables_paginate paging_bootstrap"><ul class="pagination">',
	      'full_tag_close' => '</ul></div>',
	      'num_tag_open' => '<li>',
	      'num_tag_close' => '</li>',
	      'suffix' => '?' . $suffix,
	      'first_url' => $link . '?' . $suffix
	    );

	    $this->pagination->initialize($pagination);
	    return $this->pagination->create_links();
	}
}
?>