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

    public function setSetting($setting_type, $data) {
        $this->db->query("DELETE FROM setting WHERE setting_key = " . $this->db->escape($setting_type) . " LIMIT 1");
        $result = $this->db->query("INSERT INTO setting SET setting_key = " . $this->db->escape($setting_type) . ", setting_value = '" . serialize($data) . "'");
        return $result;
    }

    public function getSetting($setting_type) {
        $result = $this->db->query("SELECT * FROM setting WHERE setting_key = " . $this->db->escape($setting_type));
        $result = $result->row(0, 'array');
        if (isset($result['setting_value']))
            return unserialize($result['setting_value']);
        else
            return array();
    }
}