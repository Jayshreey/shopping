<?php

class Bankdetails_Model extends CI_Model
{
    
    public function getall_bank_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_bankdetails');
        $info = $this->db->get();
		//print_r($this->db->last_query());die();
        return $info->result();
    }

    

}
