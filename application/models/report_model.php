<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getTotalActions() {
    	$this->load->model('action_model');

    	$action_types = $this->action_model->getActionTypes();

    	$total = 0;

    	foreach ($action_types as $action_type) {
    		$total += $this->action_model->getTotalActions($action_type['action_name']);
    	}

    	return $total;
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

    public function getCustomerStatistics($type) {
    	if ($type == 'monthly') {
    		$month = date('m');
    		$year = date('Y');

    		$result = $this->db->query("SELECT COUNT(*) AS 'total', DAY(customer_date_added) as 'day' FROM customer WHERE MONTH(customer_date_added) = " . $month . " AND YEAR(customer_date_added) = " . $year . " GROUP BY DAY(customer_date_added)");
    	}

    	return $result->result_array();
    }
}