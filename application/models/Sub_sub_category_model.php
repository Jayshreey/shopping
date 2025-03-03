<?php

class Sub_sub_category_Model extends CI_Model
{
    public function save_sub_sub_category_info($data)
    {
        return $this->db->insert('tbl_sub_sub_category', $data);
    }

    public function getall_sub_sub_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_sub_category');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_sub_sub_category_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_sub_category');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_sub_sub_category_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_sub_sub_category');
    }

    public function update_sub_sub_category_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_sub_sub_category', $data);
    }

    public function published_sub_sub_category_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('tbl_sub_sub_category');
    }

    public function unpublished_sub_sub_category_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('tbl_sub_sub_category');
    }

}
