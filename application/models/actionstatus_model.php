<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actionstatus_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getactionStatuses($filters) {
 		$result = $this->db->query("SELECT * FROM action_status LIMIT 10");

 		return $result->result_array();
 	}

 	public function getactionStatus($action_status_id) {
 		$result = $this->db->query("SELECT * FROM action_status WHERE action_status_id = '" . (int)$action_status_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function addactionStatus($data) {
 		$result = $this->db->query("INSERT INTO action_status SET content = " . $this->db->escape($data['content']) . ", value = " . $this->db->escape($data['value']));

 		return $result;
 	}

 	public function updateactionStatus($data, $action_status_id) {
 		$result = $this->db->query("UPDATE action_status SET content = " . $this->db->escape($data['content']) . ", value = " . $this->db->escape($data['value']) . " WHERE action_status_id = '" . (int)$action_status_id . "'");

 		return $result;
 	}

 	public function deleteactionStatus($action_status_id) {
 		$result = $this->db->query("DELETE FROM action_status WHERE action_status_id = '" . (int)$action_status_id . "'");

 		return $result;
 	}
}