<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getCustomers($filters) {
 		$result = $this->db->query("SELECT * FROM customers LIMIT 10");

 		return $result;
 	}
}