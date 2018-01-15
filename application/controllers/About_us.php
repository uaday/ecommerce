<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

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
        if($this->session->userdata('cart_counter')==null)
        {
            $this->session->set_userdata('cart_counter','0');
        }
        $this->session->unset_userdata('printCart');
        $this->session->unset_userdata('printUser');
        $this->session->unset_userdata('invoice_id');
        $_SESSION['sort'] = "1";
        $this->session->unset_userdata('category_id');
        $data['sliders']=$this->front_home_model->show_about_slider();
        $data['home_body']=$this->home_body_model->select_home_body();
        $data['home_tab']=$this->home_tab_model->select_home_tab();
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/about_us/view_about_us', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
}
