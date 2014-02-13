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

 	public function getCustomerColumnValue($column_name, $value) {
 		if ($column_name == 'customer_company_id') {
 			$result = $this->db->query("SELECT customer_company_name AS 'value' FROM customer_company WHERE customer_company_id = '" . $value . "'");
 		} else if ($column_name == 'customer_status_id') {
 			$result = $this->db->query("SELECT customer_status_content AS 'value' FROM customer_status WHERE customer_status_id = '" . $value . "'");
 		} else if ($column_name == 'customer_group_id') {
 			$result = $this->db->query("SELECT customer_group_content AS 'value' FROM customer_group WHERE customer_group_id = '" . $value . "'");
 		} else {
 			$result = $this->db->query("SELECT content AS 'value' FROM " . substr($column_name, 0, -3) . " WHERE value = '" . $value . "'");
 		}

 		if ($result->row(0))
 			return $result->row(0)->value;
 		else
 			return '';
 	}

 	public function addCustomer($data) {
 		$sql = "INSERT INTO customer SET ";

 		$i = 1;
 		foreach ($data as $key => $value) {
 			$sql .= $key . " = " . $this->db->escape($value);

 			if ($i != count($data))
 				$sql .= ", ";

 			$i++;
 		}

 		$result = $this->db->query($sql);

 		return $result;
 	}

 	public function updateCustomer($data, $customer_id) {
 		$sql = "UPDATE customer SET ";

 		$i = 1;
 		foreach ($data as $key => $value) {
 			$sql .= $key . " = " . $this->db->escape($value);

 			if ($i != count($data))
 				$sql .= ", ";

 			$i++;
 		}

 		$sql.= " WHERE customer_id = '" . (int)$customer_id . "'";

 		$result = $this->db->query($sql);

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