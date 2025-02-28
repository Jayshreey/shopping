<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the User_model
        $this->load->model('Registration_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // Registration page
    public function register() {
				$this->load->view('admin/pages/register');
	}
	public function user_info() {
				$registration_data_post=$this->input->post();
				//print_r($registration_data_post);die();
				$user_id=$data_insert_id=$data=$this->Registration_model->insert_user($registration_data_post);
				 redirect('admin');
	}
	
    // Handle registration form submission
    public function register_action() {
        // Set validation rules
        $this->form_validation->set_rules('user_name', 'Username', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[6]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the form with error messages
            $this->load->view('register');
        } else {
            // Check if the username or email exists
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            if ($this->User_model->username_exists($username)) {
                $this->session->set_flashdata('error', 'Username already taken');
                redirect('admin/pages/register');
            } else if ($this->User_model->email_exists($email)) {
                $this->session->set_flashdata('error', 'Email already registered');
                redirect('admin/pages/register');
            } else {
                // Data to be inserted into the database
				//echo'hii';die();
                $data = array(
                    'user_name' => $this->input->post('username'),
                    'user_email' => $this->input->post('email'),
                    'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'user_role'=>$this->input->post('user_role')
                );

                // Call the model method to insert the user
                if ($this->Registration_model->insert_user($data)) {
                    $this->session->set_flashdata('success', 'Registration successful! Please login.');
                    redirect('Registration/register');
                } else {
                    $this->session->set_flashdata('error', 'There was an issue with registration.');
                    redirect('Registration/register');
                }
            }
        }
    }
}
?>
