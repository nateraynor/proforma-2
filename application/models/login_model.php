<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function sign_in($data) {
    	$result = $this->db->query("SELECT * FROM user WHERE user_username = " . $this->db->escape($data['username_']) . " AND user_password = " . $this->db->escape(md5($data['password_'])) . " LIMIT 1")->row(0, 'array');

		return $result;
    }
}