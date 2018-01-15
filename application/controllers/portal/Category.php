<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function __construct()
    {
        parent::__construct();
        $data['name']=$this->session->userdata('name');
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('i','1');

        if($data['login_id']!=null)
        {
            $this->load->view('super_admin_view/master');
        }
        else
        {
            redirect(base_url().'portal/login');
        }
    }

    public function index()
    {
//        $this->load->view('super_admin_view/master');
        $this->load->view('super_admin_view/category/view_add_category');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function add_category()
    {
        $this->load->view('super_admin_view/category/view_add_category');
    }
    public function add_new_category()
    {
        $data['bn_category_name']=$this->input->post('bn_category_name');
        $data['en_category_name']=$this->input->post('en_category_name');
        if (!empty($_FILES['category_image']['name'])) {
            $uploadPath = 'upload/category_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('category_image')) {
                $fileData = $this->upload->data();
                $data['category_image'] = $uploadPath.$fileData['file_name'];
                $result=$this->category_model->add_new_category($data);
                if($result==1)
                {
                    $this->session->set_userdata('add_new_category',"category Successfully Added");
                    redirect(base_url().'portal/category/manage_category');
                }
            }
        }
    }
    public function edit_category_details()
    {
        $data['category_id']=$this->input->post('category_id');
        $data['bangla_category_name']=$this->input->post('bangla_category_name');
        $data['english_category_name']=$this->input->post('english_category_name');
        if (!empty($_FILES['category_image']['name'])) {
            $uploadPath = 'upload/category_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('category_image')) {
                $fileData = $this->upload->data();
                $data['category_image'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('category_image1'));

            }
        }
        else
        {
            $data['category_image'] =$this->input->post('category_image1');
        }
        $result=$this->category_model->update_category($data);
        if($result==1)
        {
            $this->session->set_userdata('update_category',"category Successfully Updated");
            redirect(base_url().'portal/category/manage_category');
        }
    }
    public function manage_category()
    {
        $data['categorys']=$this->category_model->show_all_category();

        $this->load->view('super_admin_view/category/view_manage_category',$data);
    }
    public function edit_category($category_id=0)
    {
        $data['categorys']=$this->category_model->select_category_by_category_id($category_id);
        $this->load->view('super_admin_view/category/view_edit_category',$data);
    }
    public function delete_category($category_id=0)
    {
        $result=$this->category_model->delete_category($category_id);
        if($result=='1')
        {
            redirect(base_url().'portal/category/manage_category');
        }
    }


    public function active_category($category_id=0)
    {
        $this->category_model->active_category($category_id);
        redirect(base_url().'portal/category/manage_category');
    }
    public function block_category($category_id=0)
    {
        $this->category_model->block_category($category_id);
        redirect(base_url().'portal/category/manage_category');
    }
}
