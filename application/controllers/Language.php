<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

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
    public function select_language()
    {
        $language_id=$this->input->post('language_id');
        $this->session->set_userdata('language_id',$language_id);
    }
    public function select_sort_order()
    {
        $sort=$this->input->post('sort');
        $this->session->set_userdata('sort',$sort);
    }
}
