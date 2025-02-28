<?php

class Registration_Model extends CI_Model
{
	public function insert_user($registration_data_post) //Insert Member into DB
	{
		
		//print_r($registration_data_post);die();
		$registration_data=array('user_name'=>$registration_data_post['user_name'],
								'user_email'=>$registration_data_post['user_email'],
								'user_password'=>md5($registration_data_post ['user_password']),
								'user_password'=>md5($registration_data_post['confirm_password']),
								'user_role'=>$registration_data_post['user_role']);
		
		$this->db->insert('tbl_user',$registration_data);
		
		$insert_id = $this->db->insert_id();//get last inserted id 
		return  $insert_id;
		
	}
	
    public function registration_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($data);
        $info          = $this->db->get();
		print_r($info);
        return $result = $info->row();
    }
}
