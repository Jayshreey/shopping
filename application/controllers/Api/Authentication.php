<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
//$this->output->set_header('Access-Control-Allow-Origin: *');
// $this->output->set_header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
// $this->output->set_header('Access-Control-Allow-Headers: Content-Type, Authorization');
class Authentication extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminlogin_model');
        $this->load->library('Authorization_Token');
    
    }
   
     public function login_post() {
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'User Password', 'required');

        if ($this->form_validation->run() === false) {
        
            // validation not ok, send validation errors to the view
            $this->response(['Validation rules violated'], REST_Controller::HTTP_OK);
            
        }else{
            $data                  = array();
            $data['user_email']    = $this->input->post('user_email');
            $data['user_password'] = md5($this->input->post('user_password'));

            $result = $this->adminlogin_model->admin_login_check($data);
          
           if ($result) {
               // set session user data
                $_SESSION['user_id']      = (int)$result->user_id;
                $_SESSION['username']     = (string)$result->user_name;
               
               // user login ok
                $token_data['uid'] = $result->user_id;
                $token_data['username'] = $result->user_name; 
                $tokenData = $this->authorization_token->generateToken($token_data);
                $final = array();
                $final['access_token'] = $tokenData;
                $final['status'] = true;
                $final['message'] = 'Login success!';
                $final['note'] = 'You are now logged in.';

                $this->response($final, REST_Controller::HTTP_OK); 

           }else {
               // login failed message
                $this->response(['Wrong username or password.'], REST_Controller::HTTP_OK);

           }
        } 
    }
}
?>