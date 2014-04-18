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

        $allowed_pages = $this->session->userdata['allowed_pages'];
        if(!empty($allowed_pages) && (!strstr($allowed_pages, 'settings/templates'))){
            $this->session->set_flashdata('error','Şablonlar sayfasına erişim izniniz yoktur!');
            redirect('home');
        }

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
            $config['max_size'] = '1000';
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

                if ($result){
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

    public function taxRates() {
        $this->load->model('setting_model');
        $allowed_pages = $this->session->userdata['allowed_pages'];
        if(!empty($allowed_pages) && (!strstr($allowed_pages, 'settings/tax_rates'))){
            $this->session->set_flashdata('error','Vergi oranları sayfasına erişim izniniz yoktur!');
            redirect('home');
        }
        $data['tax_rates'] = $this->setting_model->getSetting('tax_rates');

        if ($this->input->post()) {
            $key = 'tax_rates';
            $result = $this->setting_model->setSetting($key, $this->input->post());

            if ($result) {
                $this->session->set_flashdata('success', 'Vergi Oranları başarıyla kayıt edildi');
                redirect('settings/taxRates');
            } else {
                $this->session->set_flashdata('error', 'Vergi Oranları kayıt edilemedi!');
                redirect('settings/taxRates');
            }
        }

        $data['menu'] = 'settings';
        $data['page'] = 'forms';
        $data['subview'] = 'settings/tax_rates';

        $this->load->view('layouts/default', $data);
    }

     public function exchangeRates() {
        $this->load->model('setting_model');
    
        $data['exchange_rates'] = $this->setting_model->getSetting('exchange_rates');

        if ($this->input->post()) {
            $key = 'exchange_rates';
            $result = $this->setting_model->setSetting($key, $this->input->post());

            if ($result) {
                $this->session->set_flashdata('success', 'Döviz Kurları başarıyla kayıt edildi');
                redirect('settings/exchangeRates');
            } else {
                $this->session->set_flashdata('error', 'Döviz Kurları kayıt edilemedi!');
                redirect('settings/exchangeRates');
            }
        }

        $data['menu'] = 'settings';
        $data['page'] = 'forms';
        $data['subview'] = 'settings/exchange_rate';

        $this->load->view('layouts/default', $data);
    }

    public function getExchangeRate() {
        $currency = $this->input->post('currency');
        $get = file_get_contents("http://www.freecurrencyconverterapi.com/api/convert?q=" . $currency . "-TRY&compact=y");
        $result = substr($get,18,6);
        echo $result;
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