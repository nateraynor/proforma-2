<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getCustomers($filters) {
 		$result = $this->db->query("SELECT * FROM customer");

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

 	public function getCustomersForActionForm() {
 		$result = $this->db->query("SELECT customer_id as 'value', CONCAT(customer_name, ' ', customer_surname) as 'content' FROM customer ");

 		return $result->result_array();
 	}

 	public function getCustomer($customer_id) {
 		$result = $this->db->query("SELECT * FROM customer WHERE customer_id = '" . (int)$customer_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function addCustomer($data) {

 		$result = $this->db->query( "INSERT INTO customer SET customer_name = " . $this->db->escape($data['customer_name']) . " , customer_surname = " . $this->db->escape($data['customer_surname']) . " ,  customer_email = " . $this->db->escape($data['customer_email']) . " , customer_company = " . $this->db->escape($data['customer_company']) . " , customer_phone = " . $this->db->escape($data['customer_phone']) . " ,  customer_address = " . $this->db->escape($data['customer_address']) . "  , customer_date_added = now() , customer_status = '" . (int)($data['customer_status']) . "'  ");
 		return $result;
 	}

 	public function updateCustomer($data , $customer_id){
 		$result = $this->db->query("UPDATE customer SET customer_name = " . $this->db->escape($data['customer_name']) . " , customer_surname = " . $this->db->escape($data['customer_surname']) . " , customer_email = " . $this->db->escape($data['customer_email']).  " , customer_company = " . $this->db->escape($data['customer_company']) . " , customer_phone = " . $this->db->escape($data['customer_phone']) . " , customer_address = " . $this->db->escape($data['customer_address']) . " , customer_date_updated = now() , customer_status = '" . (int)($data['customer_status']) . "' WHERE customer_id = '" . (int)$customer_id . "' ");
 		return $result;
 	}

 	public function deleteCustomer($customer_id) {
 		$result = $this->db->query("DELETE FROM customer WHERE customer_id = '" . (int)$customer_id . "' LIMIT 1");
 		return $result;
 	}

 	public function getTotalCustomers() {
 		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM customer");

 		return $result->row(0)->total;
 	}
}