<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_tab extends CI_Controller {

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
        $data['home_tabs']=$this->home_tab_model->select_home_tab();
        $this->load->view('super_admin_view/home_tab/view_home_tab',$data);
    }
    public function edit_home_tab($home_tab_id=0)
    {
        $data['home_tab']=$this->home_tab_model->select_home_tab_by_home_tab_id($home_tab_id);
        $this->load->view('super_admin_view/home_tab/view_edit_home_tab',$data);
    }
    public function edit_home_tab_details()
    {
        $data['home_tab_id']=$this->input->post('home_tab_id');
        $data['bn_home_tab_header']=$this->input->post('bn_home_tab_header');
        $data['bn_home_tab_text']=$this->input->post('bn_home_tab_text');
        $data['en_home_tab_header']=$this->input->post('en_home_tab_header');
        $data['en_home_tab_text']=$this->input->post('en_home_tab_text');
        if (!empty($_FILES['home_tab_image']['name'])) {
            $uploadPath = 'upload/tab_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('home_tab_image')) {
                $fileData = $this->upload->data();
                $data['home_tab_image'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('home_tab_image1'));

            }
        }
        else
        {
            $data['home_tab_image'] =$this->input->post('home_tab_image1');
        }
        $result=$this->home_tab_model->update_home_tab($data);
        if($result==1)
        {
            $this->session->set_userdata('update_home_tab',"home_tab Successfully Updated");
            redirect(base_url().'portal/home_tab');
        }
    }

}
