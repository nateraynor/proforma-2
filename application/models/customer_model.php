<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getCustomers($filters) {
 		$sql = "SELECT * FROM customer c WHERE 1=1";

 		if (!empty($filters['filter_customer_id'])) {
            $sql .= " AND c.customer_id = '" . (int)$filters['filter_customer_id'] . "'";
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_customer_surname'])) {
            $sql .= " AND c.customer_surname LIKE " . $this->db->escape('%' . $filters['filter_customer_surname'] . '%');
        }

        if (!empty($filters['filter_customer_email'])) {
            $sql .= " AND c.customer_email LIKE " . $this->db->escape('%' . $filters['filter_customer_email'] . '%');
        }

        if (!empty($filters['filter_customer_status']) || $filters['filter_customer_status'] === '0') {
            $sql .= " AND c.customer_status = '" . (int)$filters['filter_customer_status'] . "'";
        }

        if (!empty($filters['sort'])) {
            $sql .= " ORDER BY " . $filters['sort'] . " " . $filters['sort_order'];
        }

      
 		$sql .= " LIMIT " . $filters['start'] . ", " . $filters['limit'];

 		$result = $this->db->query($sql);

 		return $result->result_array();
 	}


 	public function getTotalCustomers($filters = array()){
		$sql = "SELECT COUNT(*) AS 'total' FROM customer c WHERE 1=1";

		if (!empty($filters['filter_customer_id'])) {
            $sql .= " AND c.customer_id = '" . (int)$filters['filter_customer_id'] . "'";
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_customer_surname'])) {
            $sql .= " AND c.customer_surname LIKE " . $this->db->escape('%' . $filters['filter_customer_surname'] . '%');
        }

      	if (!empty($filters['filter_customer_email'])) {
            $sql .= " AND c.customer_email LIKE " . $this->db->escape('%' . $filters['filter_customer_email'] . '%');
        }


        if (!empty($filters) && $filters['filter_customer_status'] != '') {
            $sql .= " AND c.customer_status = '" . (int)$filters['filter_customer_status'] . "'";
        }

 		$result = $this->db->query($sql);

		return $result->row(0)->total;
	}

 	public function getCustomersForExcel($filters) {
 		$sql = "SELECT customer_id as 'Müşteri No', customer_name as 'Müşteri Adı', customer_surname as 'Müşteri Soyadı' , customer_email as 'Müşteri E-posta' , customer_company as 'Müşteri Şirket' , customer_phone as 'Müşteri Telefon' , customer_address as 'Müşteri Adres' , customer_date_added as 'Müşteri Eklenme Tarihi' , customer_date_updated as 'Müşteri Güncelleme Tarihi'  FROM customer c WHERE 1=1";

        if (!empty($filters['filter_customer_id'])) {
            $sql .= " AND c.customer_id = '" . (int)$filters['filter_customer_id'] . "'";
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_customer_surname'])) {
            $sql .= " AND c.customer_surname LIKE " . $this->db->escape('%' . $filters['filter_customer_surname'] . '%');
        }

        if (!empty($filters['filter_customer_email'])) {
            $sql .= " AND c.customer_email LIKE " . $this->db->escape('%' . $filters['filter_customer_email'] . '%');
        }

        if (!empty($filters['filter_customer_status']) || $filters['filter_customer_status'] === '0') {
            $sql .= " AND c.customer_status = '" . (int)$filters['filter_customer_status'] . "'";
        }

        $result = $this->db->query($sql);
 		return $result->result_array();
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

 		$result = $this->db->query( "INSERT INTO customer SET customer_name = " . $this->db->escape($data['customer_name']) . " , customer_surname = " . $this->db->escape($data['customer_surname']) . " ,  customer_email = " . $this->db->escape($data['customer_email']) . " , customer_company = " . $this->db->escape($data['customer_company']) . " , customer_phone = " . $this->db->escape($data['customer_phone']) . " ,  customer_address = " . $this->db->escape($data['customer_address']) . "  , customer_tax_office = " . $this->db->escape($data['customer_tax_office']) . " , customer_tax_no = " . $this->db->escape($data['customer_tax_no']) . "  ,customer_date_added = now() , customer_status = '" . (int)($data['customer_status']) . "'  ");
 		return $result;
 	}

 	public function updateCustomer($data , $customer_id){
 		$result = $this->db->query("UPDATE customer SET customer_name = " . $this->db->escape($data['customer_name']) . " , customer_surname = " . $this->db->escape($data['customer_surname']) . " , customer_email = " . $this->db->escape($data['customer_email']).  " , customer_company = " . $this->db->escape($data['customer_company']) . " , customer_phone = " . $this->db->escape($data['customer_phone']) . " , customer_address = " . $this->db->escape($data['customer_address']) . " , customer_tax_office = " . $this->db->escape($data['customer_tax_office']) . " , customer_tax_no = " . $this->db->escape($data['customer_tax_no']) . "  ,customer_date_updated = now() , customer_status = '" . (int)($data['customer_status']) . "' WHERE customer_id = '" . (int)$customer_id . "' ");
 		return $result;
 	}

 	public function deleteCustomer($customer_id) {
 		$result = $this->db->query("DELETE FROM customer WHERE customer_id = '" . (int)$customer_id . "' LIMIT 1");
 		return $result;
 	}

 
}