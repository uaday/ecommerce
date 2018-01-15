<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

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
        $limit = 3;
        $result = $this->front_notice_model->show_all_notice($limit, $offset);
        $data['notice_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("notice/index");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 5;
        //various pagination configuration
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = '';
        $config['last_link'] = '';
        $config['prev_tag_open'] = '<span class="prev">';
        $config['prev_tag_close'] = '</span>';
        $config['prev_link'] = '';
        $config['next_tag_open'] = '<span class="next">';
        $config['next_tag_close'] = '</span>';
        $config['next_link'] = '';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();



        if (!isset($_SESSION['language_id'])){
            $_SESSION['language_id'] = "1";
        }
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/notice/view_notice', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    public function details_notice($notice_id=0)
    {
        $data['notice']=$this->front_notice_model->find_notice_by_notice_id($notice_id);
        $data['hero_header'] = TRUE;
        $data['main_content'] =$this->load->view('front_end_view/notice/view_details_notice', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
}
