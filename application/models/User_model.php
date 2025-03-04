<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public $tableName 		= 'tbl_user';
	
        public function show_user()
	 {
		$this->db->select('tbl_user.*,tbl_cities.city,user_role.role_name');//select all data
		$this->db->from('tbl_user');
		$this->db->join('tbl_cities','tbl_cities.id=tbl_user.city');
		$this->db->join('user_role','user_role.role_id=tbl_user.user_role');
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		return $query->result_array();
     }
	 public function user_insert($registration_data_post) //Insert Member into DB
	{
		
		//print_r($registration_data_post);die();
		$registration_data=array('user_name'=>$registration_data_post['user_name'],
								'user_email'=>$registration_data_post['user_email'],
								'user_password'=>md5($registration_data_post ['user_password']),
								'user_role'=>$registration_data_post['user_role'],
								'mobileno'=>$registration_data_post['mobileno'],
								'city'=>$registration_data_post['city'],
								'status'=>1
								);
		
		$this->db->insert('tbl_user',$registration_data);
		
		$insert_id = $this->db->insert_id();//get last inserted id 
		return  $insert_id;
		
	}
	 function get_cities_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_cities');
       
        $instrument_query = $this->db->get();
        $instrument_list = $instrument_query->result();
		//print_r($instrument_list);die();
        return $instrument_list;  
    }
	
	function get_userrole_list()
	{
		$this->db->select('*');
        $this->db->from('user_role');
       
        $query = $this->db->get();
        $list = $query->result();
		//print_r($list);die();
        return $list;  
	}
	
	public function edit_user_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $id);
        $info = $this->db->get();
		//echo $this->db->last_query();die();
        return $info->row();
    }
	public function delete_user_info($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('tbl_user');
    }
	
	 public function update_user_info($data, $id)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_user', $data);
    }
}
