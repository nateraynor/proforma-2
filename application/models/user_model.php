<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getUsers() {
    	$result = $this->db->query("SELECT * FROM user");

    	return $result->result_array();
    }

    public function getUser($user_id) {
    	$result = $this->db->query("SELECT * FROM user WHERE user_id = '" . (int)$user_id . "' LIMIT 1");

    	return $result->row(0, 'array');
    }

    public function addUser($data) {
    	$result = $this->db->query("INSERT INTO user SET user_username = " . $this->db->escape($data['user_username']) . ", user_name = " . $this->db->escape($data['user_name']) . ", user_email = " . $this->db->escape($data['user_email']) . ", user_status = '" . (int)$data['user_status'] . "', user_allowed_pages = 'all'");
    }

    public function updateUser($data, $user_id) {
    	$result = $this->db->query("UPDATE user SET user_username = " . $this->db->escape($data['user_username']) . ", user_name = " . $this->db->escape($data['user_name']) . ", user_email = " . $this->db->escape($data['user_email']) . ", user_status = '" . (int)$data['user_status'] . "', user_allowed_pages = 'all' WHERE user_id = '" . (int)$user_id . "' ");
    }

    public function getTotalUsers() {
    	$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM user");

    	return $result->row(0)->total;
    }


}