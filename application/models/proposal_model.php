<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getProposals($filters) {
 		$sql = "SELECT *, p.proposal_id AS 'proposal_id' FROM proposal p LEFT JOIN proposal_to_customer ptc ON p.proposal_id = ptc.proposal_id LEFT JOIN customer c ON ptc.customer_id = c.customer_id WHERE 1=1";


 		if (!empty($filters['filter_proposal_id'])) {
            $sql .= " AND p.proposal_id = '" . (int)$filters['filter_proposal_id'] . "'";
        }

        if (!empty($filters['filter_proposal_name'])) {
            $sql .= " AND p.proposal_name LIKE " . $this->db->escape('%' . $filters['filter_proposal_name'] . '%');
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.proposal_total = " . (float)$filters['filter_proposal_total'];
        }

        if (!empty($filters['filter_proposal_status'])) {
            $sql .= " AND p.proposal_status = '" . (int)$filters['filter_proposal_status'] . "'";
        }

        if (!empty($filters['filter_proposal_date_added'])) {
             $sql .= " AND DATE(p.proposal_date_added) = '" . $filters['filter_proposal_date_added'] . "' ";
        }

        if (!empty($filters['sort'])) {
            $sql .= " GROUP BY p.proposal_id"." ORDER BY " . $filters['sort'] . " " . $filters['sort_order'];
        }

 		$sql .= " LIMIT " . $filters['start'] . ", " . $filters['limit'];

 		$result = $this->db->query($sql);

 		return $result->result_array();
 	}

    public function getDraftProposals($filters) {

        $sql = "SELECT *, p.proposal_id AS 'proposal_id' FROM proposal p LEFT JOIN proposal_to_customer ptc ON p.proposal_id = ptc.proposal_id LEFT JOIN customer c ON ptc.customer_id = c.customer_id WHERE p.proposal_status = '1'";


        if (!empty($filters['filter_proposal_id'])) {
            $sql .= " AND p.proposal_id = '" . (int)$filters['filter_proposal_id'] . "'";
        }

        if (!empty($filters['filter_proposal_name'])) {
            $sql .= " AND p.proposal_name LIKE " . $this->db->escape('%' . $filters['filter_proposal_name'] . '%');
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.proposal_total = " . (float)$filters['filter_proposal_total'];
        }

        if (!empty($filters['filter_proposal_date_added'])) {
             $sql .= " AND DATE(p.proposal_date_added) = '" . $filters['filter_proposal_date_added'] . "' ";
        }


        if (!empty($filters['sort'])) {
            $sql .= " GROUP BY p.proposal_id"." ORDER BY " . $filters['sort'] . " " . $filters['sort_order'];
        }

        $sql .= " LIMIT " . $filters['start'] . ", " . $filters['limit'];

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    public function getProposalsForExcel($filters){

        $sql = "SELECT p.proposal_id as 'Teklif No', proposal_name as 'Teklif Adı', proposal_statement_top as 'Teklif Üst Açıklaması' , proposal_statement_bottom as 'Teklif Alt Açıklaması' , p.proposal_date_expiration as 'Teklif Geçerlilik Tarihi' , p.proposal_date_delivery as 'Teklif Teslim Tarihi' , p.proposal_status as 'Teklif Durumu' , c.customer_name as 'Müşteri Adı' , pr.product_name as 'Ürün Adı' , pp.product_price as 'Ürün Teklif Fiyatı'  FROM proposal p LEFT JOIN proposal_note pn ON p.proposal_id = pn.proposal_id LEFT JOIN proposal_to_customer ptc ON ptc.proposal_id = p.proposal_id LEFT JOIN customer c ON c.customer_id = ptc.customer_id LEFT JOIN proposal_product pp ON p.proposal_id = pp.proposal_id LEFT JOIN product pr ON pp.product_id = pr.product_id WHERE 1=1";

        if (!empty($filters['filter_proposal_id'])) {
            $sql .= " AND p.proposal_id = '" . (int)$filters['filter_proposal_id'] . "'";
        }

        if (!empty($filters['filter_proposal_name'])) {
            $sql .= " AND p.proposal_name LIKE " . $this->db->escape('%' . $filters['filter_proposal_name'] . '%');
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.proposal_total = " . (float)$filters['filter_proposal_total'];
        }

        if (!empty($filters['filter_proposal_status']) || $filters['filter_proposal_status'] === '0') {
            $sql .= " AND p.proposal_status = '" . (int)$filters['filter_proposal_status'] . "'";
        }

        if (!empty($filters['filter_proposal_date_added'])) {
             $sql .= " AND DATE(p.proposal_date_added) = '" . $filters['filter_proposal_date_added'] . "' ";
        }

        if (!empty($filters['filter_proposal_date_updated'])) {
             $sql .= " AND DATE(p.proposal_date_updated) = '" .$filters['filter_proposal_date_updated'] . "' ";
        }


        $result = $this->db->query($sql);


        return $result->result_array();
    }

 	public function getTotalProposals($filters = array()){
		$sql = "SELECT COUNT(*) AS 'total' FROM proposal p  LEFT JOIN proposal_to_customer ptc ON p.proposal_id = ptc.proposal_id LEFT JOIN customer c ON ptc.customer_id = c.customer_id WHERE 1=1";

		if (!empty($filters['filter_proposal_id'])) {
            $sql .= " AND p.proposal_id = '" . (int)$filters['filter_proposal_id'] . "'";
        }

        if (!empty($filters['filter_proposal_name'])) {
            $sql .= " AND p.proposal_name LIKE " . $this->db->escape('%' . $filters['filter_proposal_name'] . '%');
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.proposal_total = " . (float)$filters['filter_proposal_total'];
        }

        if (!empty($filters) && $filters['filter_proposal_status'] != '') {
            $sql .= " AND p.proposal_status = '" . (int)$filters['filter_proposal_status'] . "'";
        }

        if (!empty($filters['filter_proposal_date_added'])) {

             $sql .= " AND DATE(p.proposal_date_added) = '" . $filters['filter_proposal_date_added'] . "' ";
        }

        if (!empty($filters['filter_proposal_date_updated'])) {
             $sql .= " AND DATE(p.proposal_date_updated) = '" .$filters['filter_proposal_date_updated'] . "' ";

        }


 		$result = $this->db->query($sql);

		return $result->row(0)->total;
	}

    public function getTotalDraftProposals($filters = array()){
        $sql = "SELECT COUNT(*) AS 'total' FROM proposal p  LEFT JOIN proposal_to_customer ptc ON p.proposal_id = ptc.proposal_id LEFT JOIN customer c ON ptc.customer_id = c.customer_id WHERE p.proposal_status = '1'";

        if (!empty($filters['filter_proposal_id'])) {
            $sql .= " AND p.proposal_id = '" . (int)$filters['filter_proposal_id'] . "'";
        }

        if (!empty($filters['filter_proposal_name'])) {
            $sql .= " AND p.proposal_name LIKE " . $this->db->escape('%' . $filters['filter_proposal_name'] . '%');
        }

        if (!empty($filters['filter_customer_name'])) {
            $sql .= " AND c.customer_name LIKE " . $this->db->escape('%' . $filters['filter_customer_name'] . '%');
        }

        if (!empty($filters['filter_proposal_total'])) {
            $sql .= " AND p.proposal_total = " . (float)$filters['filter_proposal_total'];
        }

        if (!empty($filters['filter_proposal_date_added'])) {

             $sql .= " AND DATE(p.proposal_date_added) = '" . $filters['filter_proposal_date_added'] . "' ";
        }


        $result = $this->db->query($sql);

        return $result->row(0)->total;
    }


 	public function getProposal($proposal_id) {
 		$result = $this->db->query("SELECT * FROM proposal p LEFT JOIN user u ON (p.proposal_creator_id = u.user_id) WHERE proposal_id = '" . (int)$proposal_id . "' LIMIT 1");

 		return $result->row(0, 'array');
 	}

 	public function getProposalCustomers($proposal_id) {
 		$result = $this->db->query("SELECT * FROM customer c LEFT JOIN proposal_to_customer ptc ON c.customer_id = ptc.customer_id WHERE ptc.proposal_id = '" . (int)$proposal_id . "'");

 		return $result->result_array();
 	}

 	public function getProposalNotes($proposal_id) {
 		$result = $this->db->query("SELECT * FROM proposal_note WHERE proposal_id = '" . (int)$proposal_id . "'");

 		return $result->result_array();
 	}

 	public function getProposalProducts($proposal_id) {
 		$result = $this->db->query("SELECT * FROM product p LEFT JOIN proposal_product pp ON p.product_id = pp.product_id WHERE pp.proposal_id = '" . (int)$proposal_id . "'");

 		return $result->result_array();
 	}



    public function updateToken($proposal_id, $token) {
        $this->db->query("UPDATE proposal SET proposal_token = " . $this->db->escape($token) . " WHERE proposal_id = '" . (int)$proposal_id . "'");
    }

    public function getProposalWithToken($token) {
        $result = $this->db->query("SELECT proposal_id FROM proposal WHERE proposal_token = " . $this->db->escape($token));

        return $result->row(0)->proposal_id;
    }

	public function addProposal($data) {

		$this->load->model('user_model');
        $data['proposal_status'] = '1';

        //proposal_status = '" . (int)$data['proposal_status'] . "',
        $data['proposal_total'] = str_replace(',','', $data['proposal_total']);

		$result = $this->db->query("INSERT INTO proposal SET proposal_name = " . $this->db->escape($data['proposal_name']) . ", proposal_statement_top = " . $this->db->escape($data['proposal_statement_top']) . ", proposal_statement_bottom = " . $this->db->escape($data['proposal_statement_bottom']) . ", proposal_total = '" . (double)$data['proposal_total'] . "', proposal_date_added = now(), proposal_date_updated = now(), proposal_date_expiration = '" . date('Y-m-d',strtotime($data['proposal_date_expiration'])) . "' , proposal_date_delivery = '" . date('Y-m-d',strtotime($data['proposal_date_delivery'])) ."', proposal_creator_id = '" . (int)$this->session->userdata['user_id'] . "'");

        $proposal_id = $this->db->insert_id();

		$user = $this->user_model->getUser($this->session->userdata['user_id']);

		$proposal_note_content = $proposal_id . " numaralı teklif " . $user['user_name'] . " " . $user['user_surname'] . " adlı kullanıcı tarafından başarıyla oluşturuldu.";

		$this->db->query("INSERT INTO proposal_note SET proposal_id = '" . $proposal_id . "', proposal_note_content = " . $this->db->escape($proposal_note_content) . ", proposal_note_user = '" . $this->session->userdata['user_id'] . "', proposal_note_status = '1', proposal_note_date_added = now(), proposal_note_date_updated = now()");
        if(!isset($data['proposal_product'])){
            $data['proposal_product'][0]['name'] = $data['name'];
            $data['proposal_product'][0]['product_id'] = $data['product_id'];
            $data['proposal_product'][0]['product_quantity'] = $data['product_quantity'];
            $data['proposal_product'][0]['product_price'] = $data['product_price'];
            $data['proposal_product'][0]['product_discount'] = $data['product_discount'];
            $data['proposal_product'][0]['product_discount_type'] = $data['product_discount_type'];
            $data['proposal_product'][0]['product_tax_rate'] = $data['product_tax_rate'];
            $data['proposal_product'][0]['product_discount'] = $data['product_discount'];
        }

        foreach ($data['proposal_product'] as $product) {
        	if ($product['product_id'] == '-1') {

        		if (trim($product['name']) != '' && trim($product['product_price']) != '') {
                    $product['product_price'] = str_replace(',', '', $product['product_price']);
                    $this->db->query("INSERT INTO product SET product_name = " . $this->db->escape($product['name']) . ", product_price = '" . (float)$product['product_price'] . "', product_tax_rate = '" . (int)$product['product_tax_rate'] . "' ,product_status = '1'" );

                    $product['product_id'] = $this->db->insert_id();

                    $result = $this->db->query("INSERT INTO proposal_product SET product_id = '" . (int)$product['product_id'] . "' , proposal_id = '" . (int)$proposal_id . "' , product_quantity = " . $this->db->escape($product['product_quantity']) . ", product_price = '" .(float)$product['product_price'] ."' , product_discount = " . $this->db->escape($product['product_discount']) ." , product_discount_type = " . (int)$product['product_discount_type'] ." , product_tax_rate = " . $this->db->escape($product['product_tax_rate']) ."");
                }

        	} else {
        		if (!isset($product['product_discount_type'])) {
        			$product['product_discount_type'] = '';
        		}

        		if (!isset($product['product_tax_rate'])) {
        			$product['product_tax_rate'] = '';
        		}
                $product['product_price'] = str_replace(',', '', $product['product_price']);
        		$result = $this->db->query("INSERT INTO proposal_product SET product_id = '" . (int)$product['product_id'] . "' , proposal_id = '" . (int)$proposal_id . "' , product_quantity = " . $this->db->escape($product['product_quantity']) . ", product_price = '" .(float)$product['product_price'] ."' , product_discount = " . $this->db->escape($product['product_discount']) ." , product_discount_type = " . (int)$product['product_discount_type'] ." , product_tax_rate = " . $this->db->escape($product['product_tax_rate']) ."");
        	}
        }

		foreach($data['proposal_customers'] as $customer_id) {
			$this->db->query("INSERT INTO proposal_to_customer SET proposal_id = '" . (int)$proposal_id . "', customer_id = '" . $customer_id . "'");
		}

        $this->db->query("INSERT INTO feed SET type='3' , dataID='". $proposal_id ."' , added_date = now() ");

		return $proposal_id;
	}

	public function updateProposal($data, $proposal_id) {
		$this->load->model('user_model');

		$user = $this->user_model->getUser($this->session->userdata['user_id']);

		$proposal_note_content = $proposal_id . " numaralı teklif " . $user['user_name'] . " " . $user['user_surname'] . " adlı kullanıcı tarafından güncellendi.";

        if ($data['proposal_status'] == '2')
            $data['proposal_status'] = '4';

		$this->db->query("INSERT INTO proposal_note SET proposal_id = '" . $proposal_id . "', proposal_note_content = " . $this->db->escape($proposal_note_content) . ", proposal_note_user = '" . $this->session->userdata['user_id'] . "', proposal_note_status = '1', proposal_note_date_added = now(), proposal_note_date_updated = now()");

		$this->db->query("DELETE FROM proposal_product WHERE proposal_id = '" . (int)$proposal_id . "' ");

		foreach ($data['proposal_product'] as $product) {
			if (!isset($product['product_discount_type'])) {
				$product['product_discount_type'] = '-1';
			}

			if (!isset($product['product_tax_rate'])) {
				$product['product_tax_rate'] = '-1';
			}

           	if ($product['product_id'] == '-1') {
           		if (trim($product['name']) != '' && trim($product['product_price']) != '') {
                    $product['product_price'] = str_replace(',', '', $product['product_price']);

           			$this->db->query("INSERT INTO product SET product_name = " . $this->db->escape($product['name']) . ", product_price = '" . (float)$product['product_price'] . "', product_tax_rate = '" . (int)$product['product_tax_rate'] . "' ,product_status = '1'" );

           			$product['product_id'] = $this->db->insert_id();

           			$result = $this->db->query("INSERT INTO proposal_product SET product_id = '" . (int)$product['product_id'] . "' , proposal_id = '" . (int)$proposal_id . "' , product_quantity = " . $this->db->escape($product['product_quantity']) . ", product_price = '" .(float)$product['product_price'] ."' , product_discount = " . $this->db->escape($product['product_discount']) ." , product_discount_type = " . (int)$product['product_discount_type'] ." , product_tax_rate = " . $this->db->escape($product['product_tax_rate']) ."");
           		}

        	} else {
                $product['product_price'] = str_replace(',', '', $product['product_price']);
        		$result = $this->db->query("INSERT INTO proposal_product SET product_id = '" . (int)$product['product_id'] . "' , proposal_id = '" . (int)$proposal_id . "' , product_quantity = " . $this->db->escape($product['product_quantity']) . ", product_price = '" .(float)$product['product_price'] ."' , product_discount = " . $this->db->escape($product['product_discount']) ." , product_discount_type = " . (int)$product['product_discount_type'] ." , product_tax_rate = " . $this->db->escape($product['product_tax_rate']) ." ");
        	}
        }

        $data['proposal_total'] = str_replace(',','', $data['proposal_total']);
        //, proposal_status = '" . (int)$data['proposal_status'] . "'
		 $result = $this->db->query("UPDATE proposal SET proposal_name = " . $this->db->escape($data['proposal_name']) . ", proposal_statement_top = " . $this->db->escape($data['proposal_statement_top']) . ", proposal_statement_bottom = " . $this->db->escape($data['proposal_statement_bottom']) . ", proposal_total = '" . (double)$data['proposal_total']. "', proposal_date_updated = now() ,proposal_date_expiration = '" . date('Y-m-d',strtotime($data['proposal_date_expiration'])) . "' , proposal_date_delivery = '" . date('Y-m-d',strtotime($data['proposal_date_delivery'])) ."' WHERE proposal_id = '" . (int)$proposal_id . "'");

        $this->db->query("DELETE FROM proposal_to_customer WHERE proposal_id = '" . (int)$proposal_id . "'");

		foreach($data['proposal_customers'] as $customer_id) {
			$this->db->query("INSERT INTO proposal_to_customer SET proposal_id = '" . (int)$proposal_id . "', customer_id = '" . $customer_id . "'");
		}

        $this->db->query("INSERT INTO feed SET type='5' , dataID='". $proposal_id ."' , added_date = now() ");

		return $proposal_id;
	}

    public function getCustomers(){
        $result = $this->db->query("SELECT * FROM customer c");
        return $result->result_array();

    }

    public function deleteProposal($proposal_id) {
        $result = $this->db->query("DELETE FROM proposal WHERE proposal_id = '" . (int)$proposal_id . "' LIMIT 1");
        return $result;
    }

    public function updateProposalStatus($proposal_id,$proposal_status){
        $this->db->query("INSERT INTO feed SET type='4' , dataID='". $proposal_id ."' , added_date = now() ");
        $result = $this->db->query("UPDATE proposal SET proposal_status =  "  . $this->db->escape($proposal_status) . " WHERE proposal_id = '" . (int)$proposal_id . "' ");
        return $result;
    }

}