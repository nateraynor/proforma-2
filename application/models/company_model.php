<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getCompanies($filters) {
 		$result = $this->db->query("SELECT * FROM customer_company LIMIT 10");

 		return $result->result_array();
 	}

 	public function getCompany($company_id) {
 		$result = $this->db->query("SELECT * FROM customer_company WHERE customer_company_id = '" . (int)$company_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function addCompany($data) {
 		if ($data['customer_company_logo'] != NULL)
 			$data['customer_company_logo'] = base_url() . 'uploads/' . $data['customer_company_logo'];

 		$result = $this->db->query("INSERT INTO customer_company SET customer_company_name = " . $this->db->escape($data['customer_company_name']) . ", customer_company_email = " . $this->db->escape($data['customer_company_email']) . ", customer_company_logo = " . $this->db->escape($data['customer_company_logo']));

 		return $result;
 	}

 	public function updateCompany($data, $company_id) {
 		if ($data['customer_company_logo'] != NULL)
 			$data['customer_company_logo'] = base_url() . 'uploads/' . $data['customer_company_logo'];

 		$result = $this->db->query("UPDATE customer_company SET customer_company_name = " . $this->db->escape($data['customer_company_name']) . ", customer_company_email = " . $this->db->escape($data['customer_company_email']) . ", customer_company_logo = " . $this->db->escape($data['customer_company_logo']) . " WHERE customer_company_id = '" . (int)$company_id . "'");

 		return $result;
 	}

 	public function deleteCompany($company_id) {
 		$result = $this->db->query("DELETE FROM customer_company WHERE customer_company_id = '" . (int)$company_id . "'");

 		return $result;
 	}
}