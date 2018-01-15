<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function index()
    {
        $data['name']=$this->session->userdata('name');
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('i','1');

        if($data['login_id']!=null)
        {
            $this->load->view('super_admin_view/master');
            $this->load->view('super_admin_view/home/view_home');
        }
        else
        {
            $this->load->view('super_admin_view/login_register/master');
            $this->load->view('super_admin_view/login_register/view_login');
        }
    }

    public function login_check()
    {

        if ($this->session->userdata('login_id') != null) {
            redirect(base_url() . 'portal/home');
        } else {
            $phone_number = $this->input->post('phone_number');
            $password = $this->input->post('password');
            $result = $this->login_model->lcheck($phone_number, $password);
            if ($result) {
                if ($result[0]->status == 1) {
//                        $this->login_model-> update_login_status($email);
                    $sess_data = array('login' => true,'user_id'=>$result[0]->user_id, 'login_id' => $result[0]->login_id, 'name' => $result[0]->name, 'user_type' => $result[0]->user_type);
                    $this->session->set_userdata($sess_data);
                    redirect(base_url() . 'portal/home');
                } else {
                    $this->session->set_userdata('message', 'Your account is Deactivated!!!');
                    redirect(base_url() . 'portal/login');
                }
            } else {
                $this->session->set_userdata('message', 'Invalid User Name/Password!!!');
                redirect(base_url() . 'portal/login');
            }

        }

    }

    public function logout()
    {
        $data = array('login' => '','user_id' => '', 'name' => '', 'login_id' => '', 'user_type' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url() . 'portal/login');
    }
}
