<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customergroup_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getCustomerGroups($filters) {
 		$result = $this->db->query("SELECT * FROM customer_group LIMIT 10");

 		return $result->result_array();
 	}

 	public function getCustomerGroup($customer_group_id) {
 		$result = $this->db->query("SELECT * FROM customer_group WHERE customer_group_id = '" . (int)$customer_group_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function addCustomerGroup($data) {
 		$result = $this->db->query("INSERT INTO customer_group SET customer_group_content = " . $this->db->escape($data['customer_group_content']) . ", customer_group_description = " . $this->db->escape($data['customer_group_description']));

 		return $result;
 	}

 	public function updateCustomerGroup($data, $customer_group_id) {
 		$result = $this->db->query("UPDATE customer_group SET customer_group_content = " . $this->db->escape($data['customer_group_content']) . ", customer_group_description = " . $this->db->escape($data['customer_group_description']) . " WHERE customer_group_id = '" . (int)$customer_group_id . "'");

 		return $result;
 	}

 	public function deleteCustomerGroup($customer_group_id) {
 		$result = $this->db->query("DELETE FROM customer_group WHERE customer_group_id = '" . (int)$customer_group_id . "'");

 		return $result;
 	}
}