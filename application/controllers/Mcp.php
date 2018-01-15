<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcp extends CI_Controller {

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
    public function index($offset = 0)
    {
        $this->session->unset_userdata('printCart');
        $this->session->unset_userdata('printUser');
        $this->session->unset_userdata('invoice_id');

        $this->session->unset_userdata('category_id');
        $limit = 12;
        $result = $this->front_mcp_model->show_all_mcp($limit, $offset);
        $data['mcp_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("mcp/index");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 5;
        //various pagination configuration
        $config['full_tag_open'] = "<ul class='pagination '>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = '';
        $config['last_link'] = '';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '&lt';
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '&gt';
        $config['cur_tag_open'] = "<li class=\"active\"><span >";
        $config['cur_tag_close'] = "</span></li>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();



        if (!isset($_SESSION['language_id'])){
            $_SESSION['language_id'] = "1";
        }
        $data['hero_header'] = TRUE;
        $data['home_tab']=$this->home_tab_model->select_home_tab();
        $data['main_content'] = $this->load->view('front_end_view/mcp/view_mcp_list', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    public function details_mcp($mcp_id=0)
    {
        $data['mcp']=$this->front_mcp_model->find_mcp_by_mcp_id($mcp_id);
        $data['hero_header'] = TRUE;
        $data['main_content'] =$this->load->view('front_end_view/mcp/view_details_mcp', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
}
