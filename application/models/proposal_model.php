<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 	public function getProposals($filters) {
 		$result = $this->db->query("SELECT * FROM proposal p");

 		return $result->result_array();
 	}

 	public function getProposal($proposal_id) {
 		$result = $this->db->query("SELECT * FROM proposal p WHERE proposal_id = '" . (int)$proposal_id . "' LIMIT 1");

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

 	public function getProposalProducts($proposal_code) {
 		$result = $this->db->query("SELECT * FROM product p LEFT JOIN proposal_product pp ON p.product_id = pp.product_id WHERE pp.proposal_code = '" . (int)$proposal_code . "'");

 		return $result->result_array();
 	}
 	public function getProposalsForExcel(){
 		$result = $this->db->query("SELECT proposal as 'prop' FORM proposal");

 		return $result->result_array();
 	}
 	public function getTotalProposals(){
		$result = $this->db->query("SELECT COUNT(*) AS 'total' FROM proposal ");

		return $result->row(0)->total;
	}

	public function addProposal($data) {
		$this->load->model('user_model');

		$result = $this->db->query("INSERT INTO proposal SET proposal_name = " . $this->db->escape($data['proposal_name']) . ", proposal_code = '" . (int)$data['proposal_temporary_id'] . "', proposal_statement_top = " . $this->db->escape($data['proposal_statement_top']) . ", proposal_statement_bottom = " . $this->db->escape($data['proposal_statement_bottom']) . ", proposal_total = '" . (double)$data['proposal_total'] . "', proposal_tax_rate = '" . (int)$data['proposal_tax_rate'] . "', proposal_discount_rate = '" . (int)$data['proposal_discount_rate'] . "', proposal_status = '" . (int)$data['proposal_status'] . "', proposal_date_added = now(), proposal_date_updated = now()");
		$proposal_id = $this->db->insert_id();

		$user = $this->user_model->getUser($this->session->userdata['user_id']);

		$proposal_note_content = $proposal_id . " numaralı teklif " . $user['user_name'] . " " . $user['user_surname'] . " adlı kullanıcı tarafından başarıyla oluşturuldu.";

		$this->db->query("INSERT INTO proposal_note SET proposal_id = '" . $proposal_id . "', proposal_note_content = " . $this->db->escape($proposal_note_content) . ", proposal_note_user = '" . $this->session->userdata['user_id'] . "', proposal_note_status = '1', proposal_note_date_added = now(), proposal_note_date_updated = now()");

		foreach($data['proposal_customers'] as $customer_id) {
			$this->db->query("INSERT INTO proposal_to_customer SET proposal_id = '" . (int)$proposal_id . "', customer_id = '" . $customer_id . "'");
		}

		return $proposal_id;
	}

	public function addTemporaryProposalProduct($data) {
		$result = $this->db->query("INSERT INTO proposal_product SET proposal_code = " . $this->db->escape($data['temporary_proposal_id']) . ", product_id = " . $this->db->escape($data['product_id']) . ", product_quantity = " . $this->db->escape($data['quantity']) . ", product_attachments = " . $this->db->escape(serialize($data['attachments'])));

		return $result;
	}

}