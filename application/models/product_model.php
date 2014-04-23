<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getProducts($filters) {
 		$sql = "SELECT * FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id LEFT JOIN category c ON c.category_id = ptc.category_id LEFT JOIN brand b ON p.brand_id = b.brand_id WHERE 1=1";

 		if (!empty($filters['filter_product_id'])) {
            $sql .= " AND p.product_id = '" . (int)$filters['filter_product_id'] . "'";
        }
 		
        if (!empty($filters['filter_product_name'])) {
            $sql .= " AND p.product_name LIKE " . $this->db->escape('%' . $filters['filter_product_name'] . '%');
        }

        if (!empty($filters['filter_category_name'])) {
            $sql .= " AND c.category_name LIKE " . $this->db->escape('%' . $filters['filter_category_name'] . '%');
        }

        if (!empty($filters['filter_brand_name'])) {
            $sql .= " AND b.brand_name LIKE " . $this->db->escape('%' . $filters['filter_brand_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.product_price = " . (float)$filters['filter_product_price'];
        }
			
        if (!empty($filters['filter_product_status']) || $filters['filter_product_status'] === '0') 
        {
            $sql .= " AND p.product_status = '" . (int)$filters['filter_product_status'] . "'";
        }

         if (!empty($filters['sort'])) {
            $sql .= " ORDER BY " . $filters['sort'] . " " . $filters['sort_order'];
        }

        $sql .= " LIMIT " . $filters['start'] . ", " . $filters['limit'];

 		$result = $this->db->query($sql);
 		return $result->result_array();
 	}

 	public function getTotalProducts($filters = array()){
		$sql = "SELECT COUNT(*) AS 'total' FROM product p LEFT JOIN product_to_category ptc ON p.product_id = ptc.product_id LEFT JOIN category c ON c.category_id = ptc.category_id LEFT JOIN brand b ON p.brand_id = b.brand_id WHERE 1=1";

		if (!empty($filters['filter_product_id'])) {
            $sql .= " AND p.product_id = '" . (int)$filters['filter_product_id'] . "'";
        }

        if (!empty($filters['filter_product_name'])) {
            $sql .= " AND p.product_name LIKE " . $this->db->escape('%' . $filters['filter_product_name'] . '%');
        }

        if (!empty($filters['filter_category_name'])) {
            $sql .= " AND c.category_name LIKE " . $this->db->escape('%' . $filters['filter_category_name'] . '%');
        }

        if (!empty($filters['filter_brand_name'])) {
            $sql .= " AND b.brand_name LIKE " . $this->db->escape('%' . $filters['filter_brand_name'] . '%');
        }

        if (!empty($filters['filter_product_price'])) {
            $sql .= " AND p.product_price = " . (float)$filters['filter_product_price'];
        }

        if (!empty($filters) && $filters['filter_product_status'] != '') {
            $sql .= " AND p.product_status = '" . (int)$filters['filter_product_status'] . "'";
        }

 		$result = $this->db->query($sql);
 	
		return $result->row(0)->total;
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
 		$this->db->query( "INSERT INTO product SET product_name = " .$this->db->escape($data['product_name']) . " , product_description = " .$this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' , product_image = " . $this->db->escape($data['product_image']) . " , product_link = " .$this->db->escape($data['product_link']) . "  ,product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_added = now()");

 		$product_id = $this->db->insert_id();
 		$result = $this->db->query("INSERT INTO product_to_category SET product_id = '" .(int)$product_id ."' , category_id = '" .(int)$data['category_id'] ."'");
 		return $result;
 	}

 	public function updateProduct($data , $product_id){
 		 $this->db->query( "UPDATE product SET 	product_name = " .$this->db->escape($data['product_name']) . " , product_description = " . $this->db->escape($data['product_description']) . " , brand_id = '" . (int)$data['brand_id'] . "', product_price = '" .(double)$data['product_price'] ."' ,product_image = " . $this->db->escape($data['product_image']) . "  , product_link = " .$this->db->escape($data['product_link']) . "  , product_tax_rate = '" .(double)$data['product_tax_rate'] .  "' , product_status = '" . (int)$data['product_status'] ."' , product_date_updated = now() WHERE product_id = '" .(int)$product_id ."'");
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