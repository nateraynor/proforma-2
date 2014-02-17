<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function getTemplates() {
        $result = $this->db->query("SELECT * FROM template");
        return $result->result_array();
    }

    public function saveTemplate($data, $template_id) {
    	$result = $this->db->query("UPDATE template SET template_html = " . $this->db->escape($data['template_html']) . ", template_name = " . $this->db->escape($data['template_name']) . " WHERE template_id = '" . (int)$template_id . "'");

    	return $result;
    }
}