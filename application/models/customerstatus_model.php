<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customerstatus_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getCustomerStatuses($filters) {
 		$result = $this->db->query("SELECT * FROM customer_status LIMIT 10");

 		return $result->result_array();
 	}

 	public function getCustomerStatus($customer_status_id) {
 		$result = $this->db->query("SELECT * FROM customer_status WHERE customer_status_id = '" . (int)$customer_status_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function addCustomerStatus($data) {
 		$result = $this->db->query("INSERT INTO customer_status SET customer_status_content = " . $this->db->escape($data['customer_status_content']) . ", customer_status_description = " . $this->db->escape($data['customer_status_description']));

 		return $result;
 	}

 	public function updateCustomerStatus($data, $customer_status_id) {
 		$result = $this->db->query("UPDATE customer_status SET customer_status_content = " . $this->db->escape($data['customer_status_content']) . ", customer_status_description = " . $this->db->escape($data['customer_status_description']) . " WHERE customer_status_id = '" . (int)$customer_status_id . "'");

 		return $result;
 	}

 	public function deleteCustomerStatus($customer_status_id) {
 		$result = $this->db->query("DELETE FROM customer_status WHERE customer_status_id = '" . (int)$customer_status_id . "'");

 		return $result;
 	}
}