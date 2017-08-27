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
    public function index()
    {
//        $this->load->view('super_admin_view/master');
//        $this->load->view('super_admin_view/shop/view_add_shop');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function create_shop()
    {
        $this->load->view('super_admin_view/master');
        $this->load->view('super_admin_view/shop/view_add_shop');
    }
    public function manage_shop($login_id=1)
    {
        $data['shops']=$this->shop_model->show_all_shop_by_user($login_id);
        $this->load->view('super_admin_view/master');
        $this->load->view('super_admin_view/shop/view_manage_shop',$data);
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
        $result=$this->shop_model->create_shop($data);
        if($result=='1')
        {
            $this->session->set_userdata('create_shop','Shop Request Successful');
            redirect(base_url().'super_admin/shop/manage_shop');
        }
    }
    public function show_all_shop_by_user($login_id=0)
    {


    }
}
