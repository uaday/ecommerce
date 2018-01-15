<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
        if (!isset($_SESSION['language_id'])){
            $_SESSION['language_id'] = "1";
        }
        $this->session->unset_userdata('printCart');
        $this->session->unset_userdata('printUser');
        $this->session->unset_userdata('invoice_id');

        $this->session->unset_userdata('category_id');
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/contact/view_contact', '', TRUE);
        $this->load->view('front_end_view/master',$data);
    }
    public function mcp_profile($mcp_id=0)
    {
        if (!isset($_SESSION['language_id'])){
            $_SESSION['language_id'] = "1";
        }
        $this->session->unset_userdata('category_id');
        $data['mcp']=$this->front_mcp_model->find_mcp_by_mcp_id($mcp_id);
        $data['learner_list']=$this->front_mcp_model->find_learner_by_mcp_id($mcp_id);
        $data['product_list']=$this->front_mcp_model->show_all_product_by_mcp_id($mcp_id);
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/profile/mcp_profile', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    public function send_message()
    {
        $data['fname']=$this->input->post('fname');
        $data['lname']=$this->input->post('lname');
        $data['email']=$this->input->post('email');
        $data['subject']=$this->input->post('subject');
        $data['message']=$this->input->post('message');
        $data['status']='1';
        $result=$this->front_end_contact_model->add_new_message($data);
        if($result=='1')
        {
            $this->session->set_userdata('send_message','Your message sent successfully');
            redirect(base_url().'contact','refresh');
        }
    }
}
