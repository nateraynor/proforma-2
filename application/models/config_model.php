<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	public function getColumns($table_name) {
 		$result = $this->db->query("SELECT COLUMN_NAME, DATA_TYPE, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $this->config->item('database') .  "' AND TABLE_NAME = '" . $table_name . "'");

 		return $result->result_array();
 	}

 	public function getColumnInfo($column_name) {
 		$result = $this->db->query("SELECT * FROM variable_name WHERE value = '" . $column_name . "' OR value = '" . substr($column_name, 0, -3) . "' LIMIT 1");
 		
 		return $result->row(0, 'array');
 	}

 	public function getSubsetValues($column_name) {
 		$last_three =  substr($column_name, -3);

 		if ($last_three == '_id') {
 			$table_name = substr($column_name, 0 , -3);
 			
 			$table_exists = $this->db->query("SHOW TABLES LIKE '" . $table_name . "'")->result_array();

 			if (!empty($table_exists)) {
 				$result = $this->db->query("SELECT * FROM " . $table_name);

 				if ($result)
 					return $result->result_array();
 				else 
 					return false;
 			}
 		} else 
 			return false;
 	}

 	public function updateColumnDisplay($column_name) {
 		$current_status = $this->db->query("SELECT display FROM variable_name WHERE value = " . $this->db->escape($column_name) . "")->row(0, 'array');

 		if ($current_status['display'] == 0)
 			$update_status = 1;
 		else
 			$update_status = 0;

 		$result = $this->db->query("UPDATE variable_name SET display = '" . $update_status . "' WHERE value = '" . $column_name . "'");

 		return $result;
 	}

}