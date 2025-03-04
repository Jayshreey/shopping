<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bankdetails extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
		$this->load->model('Bankdetails_model');
    }

	 public function account_info()
    {
        $data                = array();
		$data['all_bankdetails'] = $this->Bankdetails_model->getall_bank_info();
        $data['maincontent'] = $this->load->view('admin/pages/bank_details', $data, true);
        $this->load->view('admin/master', $data);
    }
	

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('admin');
        }

    }

}
