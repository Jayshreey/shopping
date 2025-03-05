<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Userdetails extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
		$this->load->model('User_model');
    }

    public function add_category()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_category()
    {
        $data                 = array();
        $data['all_categroy'] = $this->category_model->getall_category_info();
        $data['maincontent']  = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }
	
	 public function edit_user($id)
    {
        $data                        = array();
        $data['user_info_by_id'] = $this->User_model->edit_user_info($id);
		//print_r($data['user_info_by_id']);die();
		$data['cities_list']   = $this->User_model->get_cities_list();
		//print_r($data['cities_list']  );die();
		$data['user_role']   = $this->User_model->get_userrole_list();
		//print_r($data['user_role']);die();
        $data['maincontent']         = $this->load->view('admin/pages/edit_user', $data, true);
        $this->load->view('admin/master', $data);
    }
	
	public function update_user($id)
    {
		//echo $id;die();
        $data                         = array();
        $data['user_name']        = $this->input->post('user_name');
        $data['user_password'] = md5($this->input->post('user_password'));
        $data['user_email']   = $this->input->post('user_email');
		$data['mobileno']   = $this->input->post('mobileno');
		$data['city']   = $this->input->post('city');
		$data['user_role']   = $this->input->post('user_role');
		$data['status']   = $this->input->post('status');
		//print_r($data);die();
		 $result = $this->User_model->update_user_info($data, $id);
       
		 if ($result) {
            $this->session->set_flashdata('message', 'User Update Sucessfully');
            redirect('Userdetails/user_info');
        } else {
            $this->session->set_flashdata('message', 'User Update Failed');
            redirect('Userdetails/edit_user/'.$id);
        }

    }
	
	public function user_insert(){
				$registration_data_post=$this->input->post();
				//print_r($registration_data_post);die();
				 
				$user_id=$data_insert_id=$data=$this->User_model->user_insert($registration_data_post);
				
				 redirect('Userdetails/add_user');
	}
     public function add_user()
    {
        $data                = array();
		$data1['cities_list']   = $this->User_model->get_cities_list();
        $data['maincontent'] = $this->load->view('admin/pages/add_user',$data1, true);
        $this->load->view('admin/master', $data);
    }
	public function user_info()
    {
        $data                 = array();
        $data['all_categroy'] = $this->category_model->getall_category_info();
		$data['user_detail']   = $this->User_model->show_user();
	    //print_r($data['user_detail'] );die();
        $data['maincontent']  = $this->load->view('admin/pages/user_details', $data, true);
        $this->load->view('admin/master', $data);
    }
	
	
	public function delete_user($id)
    {
        $result = $this->User_model->delete_user_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'User Deleted Sucessfully');
            redirect('Userdetails/user_info');
        } else {
            $this->session->set_flashdata('message', 'User Deleted Failed');
            redirect('Userdetails/user_info');
        }
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
