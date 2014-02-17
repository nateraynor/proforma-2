<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getCategory($filters) {
 		$result = $this->db->query("SELECT * FROM category");
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


 	public function getCategories($category_id) {
 		$result = $this->db->query("SELECT * FROM category WHERE category_id = '" . (int)$category_id . "' LIMIT 1");
 		return $result->row(0, 'array');
 	}

 	public function addCategory($data) {

 		$result = $this->db->query( "INSERT INTO category SET category_name = " .$this->db->escape($data['category_name']) . " , category_parent_id = '" . (int)$data['category_parent_id'] . "' , category_status = '" . (int)$data['category_status'] ."'");
 		return $result;
 	}

 	public function updateCategory($data , $category_id){
 		$result = $this->db->query("UPDATE category SET category_name = " . $this->db->escape($data['category_name']) . ", category_parent_id = '" . (int)$data['category_parent_id'] . "' ,category_status = '" .(int)$data['category_status'] . "' WHERE category_id = '" . (int)$category_id ."'");
 		return $result;
 	}

 	public function deleteCategory($category_id) {
 		$result = $this->db->query("DELETE FROM category WHERE category_id = '" . (int)$category_id . "' LIMIT 1");
 		return $result;
 	}

 	public function getTotalCategory() {
 		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM category");

 		return $result->row(0)->total;
 	}
}