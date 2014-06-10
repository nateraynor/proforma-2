<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
	var $errors = array();

	public function __construct() {
    	parent::__construct();

        if (!isset($this->session->userdata['user_id']))
        	redirect('login');

    }

	public function index() {
		$this->load->model('report_model');
		$this->load->model('setting_model');

		$allowed_pages = $this->session->userdata['allowed_pages'];
		if(!empty($allowed_pages) && (!strstr($allowed_pages, 'reports'))){
			$this->session->set_flashdata('error','Raporlar  sayfasına erişim izniniz yoktur !');
			redirect('home');
		}

		$data['metaInfo'] = $this->setting_model->getSetting('meta');
		//$data['total_actions'] = $this->report_model->getTotalActions();
		$data['customer_statistics'] = $this->report_model->getCustomerStatistics('monthly');
		$data['total_products'] = $this->report_model->getTotalProducts();
		$data['total_proposals'] = $this->report_model->getTotalProposals();
		$data['total_customers'] = $this->report_model->getTotalCustomers();
		$data['total_users'] = $this->report_model->getTotalUsers();
		$data['menu'] = 'reports';
		$data['page'] = 'dashboard';
		$data['subview'] = 'report/reports';

		$this->load->view('layouts/default', $data);
	}

	public function getCustomerStatistics($type = 'monthly') {
		$this->load->model('report_model');

		$results = $this->report_model->getCustomerStatistics($type);

		echo json_encode($results);
	}

	public function getProposalStatistics($type = 'monthly') {
		$this->load->model('report_model');

		$results = $this->report_model->getProposalStatistics($type);

		echo json_encode($results);
	}

	public function getProductStatistics($type = 'monthly') {
		$this->load->model('report_model');

		$results = $this->report_model->getProductStatistics($type);

		echo json_encode($results);
	}

	public function getProposals(){

		$this->load->model('report_model');
		$proposals_draft = $this->report_model->getProposalsDraft();
		$proposals_rejected = $this->report_model->getProposalsRejected();
		$proposals_approval = $this->report_model->getProposalsApproval();

		echo json_encode(array($proposals_draft[0], $proposals_rejected[0], $proposals_approval[0]));
	}

	public function getProposalsTotal(){
		$this->load->model('report_model');
		$proposals_draft = $this->report_model->getProposalsDraftTotal();
		$proposals_rejected = $this->report_model->getProposalsRejectedTotal();
		$proposals_approval = $this->report_model->getProposalsApprovalTotal();
		$proposals_send = $this->report_model->getProposalsSendTotal();

		
		$draftTotal = 0;
		$rejectedTotal = 0;
		$approvalTotal = 0;
		$sendTotal = 0;


		foreach ($proposals_draft as $proposal_draft) {
			$draftTotal += $proposal_draft['proposal_total'];
			
		}
		foreach ($proposals_rejected as $proposal_rejected) {
			$rejectedTotal += $proposal_rejected['proposal_total'];
		}

		foreach ($proposals_approval as $proposal_approval) {
			$approvalTotal += $proposal_approval['proposal_total'];
		}

		foreach ($proposals_send as $proposal_send) {
			$sendTotal += $proposal_send['proposal_total'];
		}

		echo json_encode(array($draftTotal,$rejectedTotal,$approvalTotal,$sendTotal));
	}
}