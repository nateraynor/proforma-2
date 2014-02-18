<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getBrands($filters) {
 		$result = $this->db->query("SELECT * FROM brand");
 		return $result->result_array();
 	}

 	public function getBrand($brand_id) {
 		$result = $this->db->query("SELECT * FROM brand WHERE brand_id = '" . (int)$brand_id . "' LIMIT 1");
 		return $result->row(0, 'array');
 	}

 	public function addBrand($data) {

 		$result = $this->db->query( "INSERT INTO brand SET brand_name = " .$this->db->escape($data['brand_name']) . " , brand_status = '" . (int)$data['brand_status'] ."'");
 		return $result;
 	}

 	public function updateBrand($data , $brand_id){
 		$result = $this->db->query("UPDATE brand SET brand_name = " . $this->db->escape($data['brand_name']) . ", brand_status = '" .(int)$data['brand_status'] . "' WHERE brand_id = '" . (int)$brand_id ."'");
 		return $result;
 	}

 	public function deleteBrand($brand_id) {
 		$result = $this->db->query("DELETE FROM brand WHERE brand_id = '" . (int)$brand_id . "' LIMIT 1");
 		return $result;
 	}

 	public function getTotalBrand() {
 		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM brand");

 		return $result->row(0)->total;
 	}
}