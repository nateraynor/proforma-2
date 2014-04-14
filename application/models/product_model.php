<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getProducts($filters) {
 		$sql = "SELECT * FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id";

 		if (!empty($filters)) {
 			$sql .= " WHERE";

 			if (isset($filters['filter_name'])) {
 				$sql .= " product_name LIKE " . $this->db->escape('%' . $filters['filter_name'] . '%');
 			}

 			if (isset($filters['limit'])) {
 				$sql .= ' LIMIT ' . $filters['limit'];
 			}
 		}

 		$result = $this->db->query($sql);
 		return $result->result_array();
 	}

 	public function getProductsForExcel() {
 		$result = $this->db->query("SELECT p.product_id as 'Ürün No', product_name as 'Ürün Adı' , b.brand_name as 'Ürün Marka' , c.category_name as 'Ürün Kategori' ,product_description as 'Ürün Açıklaması', product_price as 'Ürün Fiyat', product_tax_rate as 'Ürün Vergi Oranı' , product_date_added as 'Ürün Eklenme Tarihi' , product_date_updated as 'Ürün Güncellenme Tarihi' FROM product p LEFT JOIN brand b ON p.brand_id = b.brand_id LEFT JOIN product_to_category ptc ON ptc.product_id = p.product_id LEFT JOIN category c ON ptc.category_id = c.category_id");
 		return $result->result_array();
 	}
 	public function getProduct($product_id) {
 		$result = $this->db->query("SELECT * FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id WHERE p.product_id = '" . (int)$product_id . "' LIMIT 1");
 		return $result->row(0, 'array');
 	}

 	public function addProduct($data) {
 		$this->db->query( "INSERT INTO product SET product_name = " .$this->db->escape($data['product_name']) . " , product_description = " .$this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' , product_image = " . $this->db->escape($data['product_image']) . " , product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_added = now()");

 		$product_id = $this->db->insert_id();
 		$result = $this->db->query("INSERT INTO product_to_category SET product_id = '" .(int)$product_id ."' , category_id = '" .(int)$data['category_id'] ."'");
 		return $result;
 	}

 	public function updateProduct($data , $product_id){
 		 $this->db->query( "UPDATE product SET 	product_name = " .$this->db->escape($data['product_name']) . " , product_description = " . $this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' ,product_image = " . $this->db->escape($data['product_image']) . "  , product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_updated = now() WHERE product_id = '" .(int)$product_id ."'");
 		 $result = $this->db->query("UPDATE product_to_category SET category_id = '" . (int)$data['category_id'] ."' WHERE product_id = '" . (int)$product_id."' ");
 		return $result;
 	}

 	public function deleteProduct($product_id) {
 		$result = $this->db->query("DELETE FROM product WHERE product_id = '" . (int)$product_id . "' LIMIT 1");
 		return $result;
 	}

 	public function getTotalProduct() {
 		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM product");
 		return $result->row(0)->total;
 	}

 	public function addProductFile($file_name, $product_id) {
 		$result = $this->db->query("INSERT INTO product_gallery SET product_id = '" . (int)$product_id . "', image_path = " . $this->db->escape($file_name));

 		return $result;
 	}

 	public function removeFile($file_id) {
 		$file_name = $this->db->query("SELECT image_path FROM product_gallery WHERE image_id = '" . (int)$file_id . "'")->row(0)->image_path;

 		$this->db->query("DELETE FROM product_gallery WHERE image_id = '" . $file_id . "' LIMIT 1");

 		$file_path = './uploads/' . $file_name;

 		return $file_path;
 	}

 	public function getProductFiles($product_id) {
 		$result = $this->db->query("SELECT * FROM product_gallery WHERE product_id = '" . (int)$product_id . "'");

 		return $result->result_array();
 	}
}