<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sub_sub_category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->model('Sub_sub_category_model');
    }

    public function add_sub_sub_category()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_sub_sub_category', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_sub_sub_category()
    {
        $data                 = array();
        $data['all_categroy'] = $this->Sub_sub_category_model->getall_sub_sub_category_info();
        $data['maincontent']  = $this->load->view('admin/pages/manage_sub_sub_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_sub_sub_category()
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');
        if (!empty($_FILES['sub_category_image']['name'])) {
            $config['upload_path']   = './uploads/sub_sub_category';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);
                  
            if (!$this->upload->do_upload('sub_category_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/sub_category');
            } else {
                $post_image            = $this->upload->data();
                $data['sub_category_image'] = $post_image['file_name'];
            }
        }
        $this->form_validation->set_rules('category_name', 'Sub Sub Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Sub Sub Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->Sub_sub_category_model->save_sub_sub_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Sub Sub Category Inseted Sucessfully');
                redirect('manage/sub_sub_category');
            } else {
                $this->session->set_flashdata('message', 'Sub Sub Category Inserted Failed');
                redirect('manage/sub_sub_category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/sub_sub_category');
        }

    }

    public function delete_sub_sub_category($id)
    {
        $result = $this->Sub_sub_category_model->delete_sub_sub_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Sub Sub Category Deleted Sucessfully');
            redirect('manage/sub_sub_category');
        } else {
            $this->session->set_flashdata('message', 'Sub Sub Category Deleted Failed');
            redirect('manage/sub_sub_category');
        }
    }

    public function edit_sub_sub_category($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->Sub_sub_category_model->edit_sub_sub_category_info($id);
        $data['maincontent']         = $this->load->view('admin/pages/edit_sub_sub_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_sub_sub_category($id)
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');
        $sub_category_delete_image = $this->input->post('sub_category_delete_image');

        $delete_image = substr($sub_category_delete_image, strlen(base_url()));

        $this->form_validation->set_rules('category_name', 'Sub Sub Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Sub Sub Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');
        if (!empty($_FILES['sub_category_image']['name'])) {
            $config['upload_path']   = './uploads/sub_sub_category/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('sub_category_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/sub_category');
            } else {
                $post_image            = $this->upload->data();
                $data['sub_category_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }
        if ($this->form_validation->run() == true) {
            $result = $this->Sub_sub_category_model->update_sub_sub_category_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Sub Sub Category Update Sucessfully');
                redirect('manage/sub_sub_category');
            } else {
                $this->session->set_flashdata('message', 'Sub Sub Category Update Failed');
                redirect('manage/sub_sub_category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/sub_sub_category');
        }

    }

    public function published_sub_sub_category($id)
    {
        $result = $this->Sub_sub_category_model->published_sub_sub_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Sub Sub Category Sucessfully');
            redirect('manage/sub_sub_category');
        } else {
            $this->session->set_flashdata('message', 'Published Sub Sub Category  Failed');
            redirect('manage/sub_sub_category');
        }
    }

    public function unpublished_sub_sub_category($id)
    {
        $result = $this->Sub_sub_category_model->unpublished_sub_sub_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Sub Sub Category Sucessfully');
            redirect('manage/sub_sub_category');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Sub Sub Category  Failed');
            redirect('manage/sub_sub_category');
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
