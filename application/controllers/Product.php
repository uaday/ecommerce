<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $limit = 9;
        $result = $this->front_product_model->show_all_product($limit, $offset);
        $data['product_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("product/index");
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
        $data['categories']=$this->front_category_model->show_all_active_category();
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/product/view_product', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
    public function find_product_by_category($offset = 0)
    {
        $limit = 12;

        $result = $this->front_product_model->show_all_product_by_category($limit, $offset,$this->input->get('category_id'));
        $this->session->set_userdata('category_id',$this->input->get('category_id'));
        $data['product_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("product/index");
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
        $data['categories']=$this->front_category_model->show_all_active_category();
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/product/view_product', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
    public function search_product($offset = 0)
    {
        $limit = 12;
        if($this->session->userdata('category_id'))
        {
            $result = $this->front_product_model->search_product_with_category($limit, $offset,$this->input->post('search_product'),$this->session->userdata('category_id'));
        }
        else
        {
            $result = $this->front_product_model->search_product($limit, $offset,$this->input->post('search_product'));
        }

        $data['product_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("product/search_product");
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
        $data['categories']=$this->front_category_model->show_all_active_category();
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/product/view_product', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    public function product_details($product_id=0)
    {
        $product_id=$this->input->get('product_id');
        $type=$this->input->get('type');
        $category=$this->input->get('category');
        $data['product'] = $this->front_product_model->select_product_by_product_id($product_id);
        $data['rels'] = $this->front_product_model->select_related_by_id($product_id,$type,$category);
        $data['categories']=$this->front_category_model->show_all_active_category();
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/product/view_product_details', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }
}
