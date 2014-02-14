<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Actions extends CI_Controller {

	var $errors = array();

	

	public function __construct() {		

    	parent::__construct();



        if (!isset($this->session->userdata['user_id']))

        	redirect('login');



    }





	public function index() {

		$this->load->model('action_model');

		$this->load->model('config_model');

		

		$filters = array();

		$data['actions'] = array();

		$data['action_types'] = array();



		$action_types = $this->action_model->getActionTypes();

		foreach ($action_types as $action_type) {

			$action_columns = array();



			$actions = $this->action_model->getActionsByType($action_type['action_name']);

			$action_info = $this->config_model->getColumnInfo($action_type['action_name']);

			$columns = $this->config_model->getColumns($action_type['action_name']);



			foreach ($columns as $column) {

				$column_info = $this->config_model->getColumnInfo($column['COLUMN_NAME']);

				

				if ($column_info) {

					$action_columns[] = array(

						'column_id' 	=> $column_info['variable_name_id'],

						'column_name'	=> $column_info['name'],

						'column_display'=> $column_info['display']

					);		

				}

			}



			$data['action_types'][] = array(

				'action_name' 	=> $action_info['name'],

				'action_value'	=> $action_info['value'],

				'total_acts'	=> count($actions),

				'actions'		=> $actions,

				'columns'		=> $action_columns

			);

		}



		$data['colors'] = $this->config->item('colors');

		$data['icons'] = $this->config->item('icons');

		$data['menu'] = 'actions';		

		$data['page'] = 'advancedtables';

		$data['subview'] = 'action/action_list';

		$this->load->view('layouts/default', $data);

	}	



	public function action($action_type, $action_id = -1) {

		$this->load->model('action_model');

		$this->load->model('config_model');

		$this->load->model('customer_model');



		if ($this->input->post() && $this->validate($this->input->post())) {

			$result = false;



			if ($action_id == -1) {

				$result = $this->action_model->addAction($action_type, $this->input->post());



				if ($result) {

					$this->session->set_flashdata('success', 'İşlem başarıyla eklendi');

					redirect('actions');

				}

			} else {

				$result = $this->action_model->updateAction($action_type, $this->input->post(), $action_id);



				if ($result) {

					$this->session->set_flashdata('success', 'İşlem başarıyla güncellendi');

					redirect('actions');

				}

			}

		}



		$columns = $this->config_model->getColumns($action_type);



		if ($action_id != -1)

			$action_info = $this->action_model->getAction($action_type, $action_id);



		foreach ($columns as $column) {

			$column_info = $this->config_model->getColumnInfo($column['COLUMN_NAME']);

			$column_subset = false;

			$subset_columns = false;



			if ($column['COLUMN_KEY'] != 'PRI' && $column['COLUMN_NAME'] != 'action_customer_id')

				$column_subset = $this->config_model->getSubsetValues($column['COLUMN_NAME']);

			else if ($column['COLUMN_NAME'] == 'action_customer_id')

				$column_subset = $this->customer_model->getCustomersForActionForm();



			if ($column_info) {

				$data['columns'][] = array(

					'column_id' 	 => $column_info['variable_name_id'],

					'column_name'	 => $column_info['name'],

					'column_value'   => $column['COLUMN_NAME'],

					'column_display' => $column_info['display'],

					'column_type'	 => $column['DATA_TYPE'],

					'column_key'	 => $column['COLUMN_KEY'],

					'action_value'	 => isset($action_info[$column['COLUMN_NAME']]) ? $action_info[$column['COLUMN_NAME']] : '',

					'subset'		 => $column_subset

				);		

			}

		}



		$action_info = $this->config_model->getColumnInfo($action_type);



		$data['action_name'] = $action_info['name'];

		$data['action_type'] = $action_type;

		$data['action_id'] = $action_id;

		$data['page'] = 'forms';

		$data['subview'] = 'action/action';



		$this->load->view('layouts/default', $data);

	}



	public function deleteAction($action_type, $action_id) {

		$this->load->model('action_model');



		$result = $this->action_model->deleteAction($action_type, $action_id);



		if ($result)

			$this->session->set_flashdata('success', 'İşlem kaydı başarıyla silindi!');

		else

			$this->session->set_flashdata('error', 'İşlem kaydı silinemedi!');



		redirect('actions');

	}



	public function excelOutput($action_type) {

		$this->load->library('excel');

		$this->load->model('action_model');

		

		$results = $this->action_model->getActionsForExcel($action_type);



        $this->excel->to_excel($results, 'actions-excel', 'İşlemler');

	}



	public function validate($data) {

		$errors = array();



		if (isset($data['action_name']) && strlen(trim($data['action_name'])) < 3)

			$errors[] = 'İşlem adı alanı minimum 3 karakter olmalıdır';



		if (!empty($errors)) {

			$this->errors = $errors;

			return false;

		} else {

			return true;

		}

	}

}