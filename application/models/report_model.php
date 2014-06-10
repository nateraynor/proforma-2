<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getTotalCustomers() {
    	$this->load->model('customer_model');

    	$total = $this->customer_model->getTotalCustomers();

    	return $total;
    }

    public function getTotalUsers() {
    	$this->load->model('user_model');

    	$total = $this->user_model->getTotalUsers();

    	return $total;
    }

    public function getTotalProducts(){
        $this->load->model('product_model');

        $total = $this->product_model->getTotalProduct();

        return $total;
    }

    public function getTotalProposals(){
        $this->load->model('proposal_model');

        $filters = array();

        $total = $this->proposal_model->getTotalProposals($filters);

        return $total;
    }
    public function getCustomerStatistics($type) {
    	if ($type == 'monthly') {
    		$month = date('m');
    		$year = date('Y');

    		$result = $this->db->query("SELECT COUNT(*) AS 'total', DAY(customer_date_added) as 'day' FROM customer WHERE MONTH(customer_date_added) = " . $month . " AND YEAR(customer_date_added) = " . $year . " GROUP BY DAY(customer_date_added)");

    	}

    	return $result->result_array();
    }

     public function getProposalStatistics($type) {
        if ($type == 'monthly') {
            $month = date('m');
            $year = date('Y');

            $result = $this->db->query("SELECT COUNT(*) AS 'total', DAY(proposal_date_added) as 'day' FROM proposal WHERE MONTH(proposal_date_added) = " . $month . " AND YEAR(proposal_date_added) = " . $year . " GROUP BY DAY(proposal_date_added)");

        }

        return $result->result_array();
    }

     public function getProductStatistics($type) {
        if ($type == 'monthly') {
            $month = date('m');
            $year = date('Y');

            $result = $this->db->query("SELECT COUNT(*) AS 'total', DAY(product_date_added) as 'day' FROM product WHERE MONTH(product_date_added) = " . $month . " AND YEAR(product_date_added) = " . $year . " GROUP BY DAY(product_date_added)");

        }

        return $result->result_array();
    }

    public function getProposalsDraft(){

        $result =  $this->db->query("SELECT COUNT(*) AS 'total' FROM proposal WHERE proposal_status = 1");

        return $result->result_array();
    }

    public function getProposalsRejected(){

        $result =  $this->db->query("SELECT COUNT(*) AS 'total' FROM proposal WHERE proposal_status = 5");

        return $result->result_array();
    }

    
    public function getProposalsApproval(){

        $result =  $this->db->query("SELECT COUNT(*) AS 'total' FROM proposal WHERE proposal_status = 3");

        return $result->result_array();
    }

    public function getProposalsDraftTotal(){
        $result = $this->db->query("SELECT * FROM proposal WHERE proposal_status = 1");
        return $result->result_array();
    }

    public function getProposalsRejectedTotal(){
        $result =  $this->db->query("SELECT * FROM proposal WHERE proposal_status = 5");
        return $result->result_array();
    }

    public function getProposalsApprovalTotal(){
        $result =  $this->db->query("SELECT * FROM proposal WHERE proposal_status = 3");
        return $result->result_array();
    }

    public function getProposalsSendTotal(){
        $result =  $this->db->query("SELECT * FROM proposal WHERE proposal_status = 2");
        return $result->result_array();
    }
}