<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_body extends CI_Controller {

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
        $data['home_body']=$this->home_body_model->select_home_body();
        $this->load->view('super_admin_view/home_body/view_home_body',$data);
    }
    public function edit_home_body()
    {
        $data['home_body_id']=$this->input->post('home_body_id');
        $data['bn_body_header']=$this->input->post('bn_body_header');
        $data['en_body_header']=$this->input->post('en_body_header');
        $data['bn_body_text']=$this->input->post('bn_body_text');
        $data['en_body_text']=$this->input->post('en_body_text');
        $result=$this->home_body_model->update_home_body($data);
        if($result==1)
        {
            $this->session->set_userdata('update_home_body',"Home Body Successfully Updated");
            redirect(base_url().'portal/home_body');
        }
    }

}
