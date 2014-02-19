<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {
	var $errors = array();
	public function __construct() {
    	parent::__construct();
        if (!isset($this->session->userdata['user_id']))
        	redirect('login');
    }
    public function templates() {
    	$this->load->model('setting_model');
    	$data['templates'] = $this->setting_model->getTemplates();
        $data['menu'] = 'settings';
        $data['page'] = 'forms';
        $data['subview'] = 'settings/template';
        $this->load->view('layouts/default', $data);
    }
    public function companyInfo() {
        $this->load->model('setting_model');
        $data['company'] = $this->setting_model->getSetting('company_info');
        if ($this->input->post() && $this->validate($this->input->post())) {
            $result = false;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '500';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $this->load->library('upload', $config);
            if ($_FILES['company_image']['name'] != '' && !$this->upload->do_upload('company_image')){
                $this->errors[] = $this->upload->display_errors();
            } else {
                $insert_data = $this->input->post();
                if($_FILES['company_image']['name'] != '')
                    $upload_data = $this->upload->data();
                else
                    $upload_data['file_name'] = $data['company']['company_image'];
                $insert_data['company_image'] = $upload_data['file_name'];
                $result = $this->setting_model->setSetting('company_info', $insert_data);
            }
            if ($result) {
                $this->session->set_flashdata('success', 'Şirket bilgileri başarıyla kayıt edildi');
                redirect('settings/generalSetting#company_setting');
            }
        }
    }

    public function generalSetting(){
        $this->load->model('setting_model');

        if ($this->input->post()) {
            $key = $this->input->post('key');
            $result = $this->setting_model->setSetting($key, $this->input->post());

                if($result){
                    if($key == 'meta'){
                        $this->session->set_flashdata('success', 'Meta bilgileri başarıyla kayıt edildi');
                        redirect('settings/generalSetting');   
                    }
                    if($key == 'email'){
                        $this->session->set_flashdata('success', 'E-posta bilgileri başarıyla kayıt edildi');
                        redirect('settings/generalSetting#email_setting');
                    }
                 }
        }
         
        $data['metaInfo'] = $this->setting_model->getSetting('meta');
        $data['emailInfo'] = $this->setting_model->getSetting('email');
        $data['company'] = $this->setting_model->getSetting('company_info');
        $data['errors'] = $this->errors;
        $data['menu'] = 'settings';
        $data['page'] = 'forms';
        $data['subview'] = 'settings/settings';
        $this->load->view('layouts/default', $data);
    }

    public function saveTemplate($template_id) {
        $this->load->model('setting_model');
        $result = $this->setting_model->saveTemplate($this->input->post(), $template_id);
        echo $result;
    }
    public function validate($data) {
        $errors = array();
        if (isset($data['company_name']) && strlen($data['company_name']) < 3) {
            $errors[] = 'Şirket adı alanı minimum 3 karakter olmalıdır';
        }
        if (isset($data['company_entitled_name']) && strlen($data['company_entitled_name']) < 3) {
            $errors[] = 'Şirket Yetkilisi adı alanı minimum 3 karakter olmalıdır';
        }
        if (!empty($errors)) {
            $this->errors = $errors;
            return false;
        } else {
            return true;
        }
    }
}