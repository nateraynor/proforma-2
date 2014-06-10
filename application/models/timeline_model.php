<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getActivities() {
 		$resultUrun = $this->db->query("SELECT * FROM feed f LEFT JOIN product p ON p.product_id=f.dataID WHERE type='1' OR type='2' ORDER BY f.added_date LIMIT 10");
 		$resultProposal = $this->db->query("SELECT * FROM feed f LEFT JOIN proposal p ON p.proposal_id=f.dataID WHERE type='3' OR type='4' OR type='5' ORDER BY f.added_date LIMIT 10");
 		$resultCustomer = $this->db->query("SELECT * FROM feed f LEFT JOIN customer c ON c.customer_id=f.dataID WHERE type='6' OR type='7' ORDER BY f.added_date LIMIT 10");
 		$merged_array = array_merge($resultCustomer->result_array(),$resultUrun->result_array(),$resultProposal->result_array());

 		usort($merged_array, function($a, $b) {
		    return strcmp($a['added_date'], $b['added_date']);
		});
		
		return array_reverse($merged_array);
 	}

 	
}