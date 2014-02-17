<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Action_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function getActions($data) {
    	$result = $this->db->query("SELECT * FROM action");
    	return $result->result_array();
    }
    public function getActionsForExcel($action_type) {
        $this->load->model('config_model');
        $columns = $this->config_model->getColumns($action_type);
        $sql = "SELECT * FROM " . $action_type;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        foreach ($result as $key => $action_info) {
            foreach ($action_info as $key_sub => $value) {
                $column_info = $this->config_model->getColumnInfo($key_sub);
                $action_info[$column_info['name']] = $value;
                unset($action_info[$key_sub]);
            }
            $result[$key] = $action_info;
        }
        return $result;
    }
    public function getAction($action_type, $action_id) {
        $result = $this->db->query("SELECT * FROM " . $action_type . " WHERE action_id = '" . (int)$action_id . "'");
        return $result->row(0, 'array');
    }
    public function getActionTypes() {
    	$result = $this->db->query("SELECT action_name FROM action_product_related");
    	return $result->result_array();
    }
    public function addAction($action_type, $data) {
        $sql = "INSERT INTO " . $action_type . " SET ";
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= $key . " = " . $this->db->escape($value);
            if ($i != count($data))
                $sql .= ", ";
            $i++;
        }
        $result = $this->db->query($sql);
        return $result;
    }
    public function updateAction($action_type, $data, $action_id) {
        $sql = "UPDATE " . $action_type . " SET ";
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= $key . " = " . $this->db->escape($value);
            if ($i != count($data))
                $sql .= ", ";
            $i++;
        }
        $sql.= " WHERE action_id = '" . (int)$action_id . "'";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getActionColumnValue($column_name, $value) {
        if ($column_name == 'action_customer_id')
            $result = $this->db->query("SELECT CONCAT(customer_name, ' ', customer_surname) AS 'value' FROM customer WHERE customer_id = '" . $value . "'");
        else
            $result = $this->db->query("SELECT content AS 'value' FROM " . substr($column_name, 0, -3) . " WHERE value = '" . $value . "'");
        return $result->row(0)->value;
    }
    public function deleteAction($action_type, $action_id) {
        $result = $this->db->query("DELETE FROM " . $action_type . " WHERE action_id = '" . (int)$action_id . "' LIMIT 1");
        return $result;
    }
    public function getActionsByType($action_type) {
    	$result = $this->db->query("SELECT * FROM " . $action_type);
    	return $result->result_array();
    }
    public function getTotalActions($action_type) {
        $result = $this->db->query("SELECT COUNT(*) AS 'total' FROM " . $action_type);
        return $result->row(0)->total;
    }
}