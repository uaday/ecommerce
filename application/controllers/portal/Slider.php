<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
        $this->load->view('super_admin_view/shop/view_add_shop');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function add_slider()
    {
        $this->load->view('super_admin_view/slider/view_add_slider');
    }
    public function add_new_slider()
    {
        $data['bangla_slider_header']=$this->input->post('bangla_slider_header');
        $data['bangla_slider_text']=$this->input->post('bangla_slider_text');
        $data['english_slider_header']=$this->input->post('english_slider_header');
        $data['english_slider_text']=$this->input->post('english_slider_text');
        if (!empty($_FILES['slider_image']['name'])) {
            $uploadPath = 'upload/slider_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('slider_image')) {
                $fileData = $this->upload->data();
                $data['slider_image'] = $uploadPath.$fileData['file_name'];
                $result=$this->slider_model->add_new_slider($data);
                if($result==1)
                {
                    $this->session->set_userdata('add_new_slider',"Slider Successfully Added");
                    redirect(base_url().'portal/slider/manage_slider');
                }
            }
        }
    }
    public function edit_slider_details()
    {
        $data['slider_id']=$this->input->post('slider_id');
        $data['bangla_slider_header']=$this->input->post('bangla_slider_header');
        $data['bangla_slider_text']=$this->input->post('bangla_slider_text');
        $data['english_slider_header']=$this->input->post('english_slider_header');
        $data['english_slider_text']=$this->input->post('english_slider_text');
        if (!empty($_FILES['slider_image']['name'])) {
            $uploadPath = 'upload/slider_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('slider_image')) {
                $fileData = $this->upload->data();
                $data['slider_image'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('slider_image1'));

            }
        }
        else
        {
            $data['slider_image'] =$this->input->post('slider_image1');
        }
        $result=$this->slider_model->update_slider($data);
        if($result==1)
    {
        $this->session->set_userdata('update_slider',"Slider Successfully Updated");
        redirect(base_url().'portal/slider/manage_slider');
    }
    }
    public function manage_slider()
    {
        $data['sliders']=$this->slider_model->show_all_slider();
        $this->load->view('super_admin_view/slider/view_manage_slider',$data);
    }
    public function edit_slider($slider_id=0)
    {
        $data['sliders']=$this->slider_model->select_slider_by_slider_id($slider_id);
        $this->load->view('super_admin_view/slider/view_edit_slider',$data);
    }
    public function delete_slider($slider_id=0)
    {
        $result=$this->slider_model->delete_slider($slider_id);
        if($result=='1')
        {
            redirect(base_url().'portal/slider/manage_slider');
        }
    }


    public function active_slider($slider_id=0)
    {
        $this->slider_model->active_slider($slider_id);
        redirect(base_url().'portal/slider/manage_slider');
    }
    public function block_slider($slider_id=0)
    {
        $this->slider_model->block_slider($slider_id);
        redirect(base_url().'portal/slider/manage_slider');
    }
}
