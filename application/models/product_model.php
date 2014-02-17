<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Product_model extends CI_Model {



    function __construct() {

        parent::__construct();

    }



 	public function getProducts($filters) {

 		$result = $this->db->query("SELECT * FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id");

 		return $result->result_array();

 	}



 	public function getCustomersForExcel() {

 		$this->load->model('config_model');



 		$columns = $this->config_model->getColumns('customer');



 		$sql = "SELECT * FROM customer";



 		$result = $this->db->query($sql);

 		$result = $result->result_array();



 		foreach ($result as $key => $customer_info) {

 			foreach ($customer_info as $key_sub => $value) {

	 			$column_info = $this->config_model->getColumnInfo($key_sub);



 				$customer_info[$column_info['name']] = $value;

 				unset($customer_info[$key_sub]);

 			}

			$result[$key] = $customer_info;

 		}



 		return $result;

 	}




 	public function getProduct($product_id) {

 		$result = $this->db->query("SELECT * FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id WHERE p.product_id = '" . (int)$product_id . "' LIMIT 1");

 		return $result->row(0, 'array');

 	}


 	public function addProduct($data) {

 		$this->db->query( "INSERT INTO product SET product_name = " .$this->db->escape($data['product_name']) . " , product_description = " .$this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' , product_image = " . $this->db->escape($data['product_image']) . " , product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_added = now()");

 	
 		$product_id = $this->db->insert_id();

 		$result = $this->db->query("INSERT INTO product_to_category SET product_id = '" .(int)$product_id ."' , category_id = '" .(int)$data['category_id'] ."'");
 		return $result;

 	}



 	public function updateProduct($data , $product_id){

 		 $this->db->query( "UPDATE product SET 	product_name = " .$this->db->escape($data['product_name']) . " , product_description = " . $this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' ,product_image = " . $this->db->escape($data['product_image']) . "  , product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_updated = now() WHERE product_id = '" .(int)$product_id ."'");

 		 $result = $this->db->query("UPDATE product_to_category SET category_id = '" . (int)$data['category_id'] ."' WHERE product_id = '" . (int)$product_id."' ");

 		return $result;
 	}



 	public function deleteProduct($product_id) {

 		$result = $this->db->query("DELETE FROM product WHERE product_id = '" . (int)$product_id . "' LIMIT 1");

 		return $result;

 	}



 	public function getTotalProduct() {

 		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM product");

 		return $result->row(0)->total;

 	}

}