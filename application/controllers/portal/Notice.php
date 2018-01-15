<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

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
        $this->load->view('super_admin_view/notice/view_add_notice');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function add_notice()
    {
        $this->load->view('super_admin_view/notice/view_add_notice');
    }
    public function add_new_notice()
    {
        $data['bn_notice_header']=$this->input->post('bn_notice_header');
        $data['bn_notice_text']=$this->input->post('bn_notice_text');
        $data['en_notice_header']=$this->input->post('en_notice_header');
        $data['en_notice_text']=$this->input->post('en_notice_text');
        if (!empty($_FILES['notice_image']['name'])) {
            $uploadPath = 'upload/notice_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('notice_image')) {
                $fileData = $this->upload->data();
                $data['notice_image'] = $uploadPath.$fileData['file_name'];
            }
        }
        else
        {
            $data['notice_image']='';
        }
        $result=$this->notice_model->add_new_notice($data);
        if($result==1)
        {
            $this->session->set_userdata('add_new_notice',"Notice Successfully Added");
            redirect(base_url().'portal/notice/manage_notice');
        }
    }
    public function edit_notice_details()
    {
        $data['notice_id']=$this->input->post('notice_id');
        $data['bangla_notice_header']=$this->input->post('bangla_notice_header');
        $data['bangla_notice_text']=$this->input->post('bangla_notice_text');
        $data['english_notice_header']=$this->input->post('english_notice_header');
        $data['english_notice_text']=$this->input->post('english_notice_text');
        if (!empty($_FILES['notice_image']['name'])) {
            $uploadPath = 'upload/notice_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('notice_image')) {
                $fileData = $this->upload->data();
                $data['notice_image'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('notice_image1'));
            }
        }
        else
        {
            $data['notice_image'] =$this->input->post('notice_image1');
        }
        $result=$this->notice_model->update_notice($data);
        if($result==1)
        {
            $this->session->set_userdata('update_notice',"Notice Successfully Updated");
            redirect(base_url().'portal/notice/manage_notice');
        }
    }
    public function manage_notice()
    {
        $data['notices']=$this->notice_model->show_all_notice();
        $this->load->view('super_admin_view/notice/view_manage_notice',$data);
    }
    public function edit_notice($notice_id=0)
    {
        $data['notices']=$this->notice_model->select_notice_by_notice_id($notice_id);
        $this->load->view('super_admin_view/notice/view_edit_notice',$data);
    }
    public function delete_notice($notice_id=0)
    {
        $result=$this->notice_model->delete_notice($notice_id);
        if($result=='1')
        {
            redirect(base_url().'portal/notice/manage_notice');
        }
    }


    public function active_notice($notice_id=0)
    {
        $this->notice_model->active_notice($notice_id);
        redirect(base_url().'portal/notice/manage_notice');
    }
    public function block_notice($notice_id=0)
    {
        $this->notice_model->block_notice($notice_id);
        redirect(base_url().'portal/notice/manage_notice');
    }
}
