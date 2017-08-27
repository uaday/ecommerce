<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

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
            redirect(base_url().'super_admin/login');
        }
    }

    public function index()
    {
//        $this->load->view('super_admin_view/master');
        $this->load->view('super_admin_view/shop/view_add_shop');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function create_shop()
    {
        $this->load->view('super_admin_view/shop/view_add_shop');
    }
    public function shop_list()
    {
        $data['shops']=$this->shop_model->show_all_shop_by_user($this->session->userdata('user_id'));
        $this->load->view('super_admin_view/shop/view_shop_list',$data);
    }
    public function request_shop()
    {
        $data['shops']=$this->shop_model->show_all_request_shop();
        $this->load->view('super_admin_view/shop/view_request_shop',$data);
    }
    public function online_shop()
    {
        $data['shops']=$this->shop_model->show_all_online_shop();
        $this->load->view('super_admin_view/shop/view_online_shop',$data);
    }
    public function pending_shop()
    {
        $shop_id=$this->input->get('shop_id');
        $result=$this->shop_model->pending_shop_by_shop_id($shop_id);
        if($result=='1')
        {
            redirect(base_url().'super_admin/shop/request_shop');
        }
    }
    public function processing_shop()
    {
        $shop_id=$this->input->get('shop_id');
        $result=$this->shop_model->processing_shop_by_shop_id($shop_id);
        if($result=='1')
        {
            redirect(base_url().'super_admin/shop/request_shop');
        }
    }
    public function accept_shop()
    {
        $shop_id=$this->input->get('shop_id');
        $result=$this->shop_model->accept_shop_by_shop_id($shop_id);
        if($result=='1')
        {
            redirect(base_url().'super_admin/shop/online_shop');
        }
    }
    public function add_shop()
    {
        $data['shop_owner']=$this->input->post('shop_owner');
        $data['address']=$this->input->post('address');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['shop_name']=$this->input->post('shop_name');
        $data['opening_time']=$this->input->post('opening_time');
        $data['country']=$this->input->post('country');
        $data['region']=$this->input->post('region');
        $data['language']=$this->input->post('language');
        $data['currency']=$this->input->post('currency');
        $data['user_id']=$this->session->userdata('user_id');
        $result=$this->shop_model->create_shop($data);
        if($result=='1')
        {
            $this->session->set_userdata('create_shop','Shop Request Successful');
            if($this->session->userdata('user_type')=='1')
            {
                redirect(base_url().'super_admin/shop/request_shop');
            }
            else
            {
                redirect(base_url().'super_admin/shop/shop_list');
            }
        }
    }
}
