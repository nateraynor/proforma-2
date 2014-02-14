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
    	$result = $this->db->query("INSERT INTO user SET  user_name = " . $this->db->escape($data['user_name']) . ", user_surname = " . $this->db->escape($data['user_surname']) . " ,user_username = " . $this->db->escape($data['user_username']) . " ,user_email = " . $this->db->escape($data['user_email']) . ", user_password = " . $this->db->escape(md5($data['user_password'])) . " ,user_status = '" . (int)$data['user_status'] . "', user_date_added = now()"); //Allowed pages eklenicek
        
        return $result;
    }

    public function updateUser($data, $user_id) {
    	$result = $this->db->query("UPDATE user SET  user_name = " . $this->db->escape($data['user_name']) . ", user_surname = " . $this->db->escape($data['user_surname']) . ", user_username = " . $this->db->escape($data['user_username']) . ", user_email = " . $this->db->escape($data['user_email']) . ", user_password = " . $this->db->escape(md5($data['user_password'])) . " ,user_status = '" . (int)$data['user_status'] . "', user_date_updated = now()  WHERE user_id = '" . (int)$user_id . "' ");
        return $result;
        
    }

    public function getTotalUsers() {
    	$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM user");

    	return $result->row(0)->total;
    }
    public function checkUserEmail($user_email){
        $result = $this->db->query("SELECT * FROM user WHERE user_email = " . $this->db->escape($user_email) . " LIMIT 1");
        if($result->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }

    public function checkUsername($user_username){
        $result = $this->db->query("SELECT * FROM user WHERE user_username = " . $this->db->escape($user_username) . " LIMIT 1");
        if($result->num_rows > 0)
            return false;
        else
            return true;


    }

    public function deleteUser($user_id){
        $result = $this->db->query("DELETE FROM user WHERE user_id = '" . (int)$user_id. "' LIMIT 1");
        return $result;
    }
    public function getUserEmail($user_id){
        $result = $this->db->query("SELECT user_email FROM user WHERE user_id = '" . (int)$user_id . "' ");
        if($result->row(0))
            return $result->row(0)->user_email;
        else
            return false;
    }

    public function getUsername($user_id){
        $result = $this->db->query("SELECT user_username FROM user WHERE user_id = '" . (int)$user_id . "'");
        if($result->row(0))
            return $result->row(0)->user_username;
        else
            return false;
    }
}