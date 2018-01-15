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
        $data['categories']=$this->category_model->show_all_category();
        $data['designs']=$this->product_settings_model->show_active_product_design();
        $data['conditions']=$this->product_settings_model->show_active_product_condition();
        $data['grades']=$this->product_settings_model->show_active_product_grade();
        $this->load->view('super_admin_view/product/view_add_product',$data);
    }
    public function add_product()
    {
        $data['categories']=$this->category_model->show_all_category();
        $data['designs']=$this->product_settings_model->show_active_product_design();
        $data['conditions']=$this->product_settings_model->show_active_product_condition();
        $data['grades']=$this->product_settings_model->show_active_product_grade();
        $this->load->view('super_admin_view/product/view_add_product',$data);
    }
    public function add_new_product()
    {

        $data['service']=$this->input->post('p_s');
        $data['product_name']=$this->input->post('product_name');
        $data['p_s_description']=$this->input->post('p_s_description');
        $data['product_price']=$this->input->post('product_price');
        $data['product_category']=$this->input->post('product_category');
        if($data['service']=='1')
        {

            $data['product_material']='';
            $data['product_color']='';
            $data['product_size']='';
            $data['product_condition']='';
            $data['product_design']='';
            $data['product_grade']='';
            $data['product_design']='';
        }
        else
        {
            $data['product_material']=$this->input->post('product_material');
            $data['product_color']=$this->input->post('product_color');
            $data['product_size']=$this->input->post('product_size');
            $data['product_condition']=$this->input->post('product_condition');

            if($this->input->post('product_design')!="")
            {
                $data['product_design']=implode(',',$this->input->post('product_design'));
            }
            else
            {
                $data['product_design']='';
            }
            if($this->input->post('product_grade')!="")
            {
                $data['product_grade']=implode(',',$this->input->post('product_grade'));
            }
            else
            {
                $data['product_grade']='';
            }

        }

        if (!empty($_FILES['product_image']['name'])) {
            $uploadPath = 'upload/product_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('product_image')) {
                $fileData = $this->upload->data();
                $data['product_image'] = $uploadPath.$fileData['file_name'];
                $result=$this->product_model->add_new_product($data);
                if($result==1)
                {
                    $this->session->set_userdata('add_new_product',"product Successfully Added");
                    redirect(base_url().'portal/product/manage_product');
                }
            }
        }
    }
    public function edit_product_details()
    {

        $data['product_id']=$this->input->post('product_id');
        $data['service']=$this->input->post('p_s');
        $data['product_name']=$this->input->post('product_name');
        $data['p_s_description']=$this->input->post('p_s_description');
        $data['product_price']=$this->input->post('product_price');
        $data['product_category']=$this->input->post('product_category');

        if($data['service']=='1')
        {

            $data['product_material']='';
            $data['product_color']='';
            $data['product_size']='';
            $data['product_condition']='';
            $data['product_design']='';
            $data['product_grade']='';
            $data['product_design']='';
        }


        else
        {
            $data['product_material']=$this->input->post('product_material');
            $data['product_color']=$this->input->post('product_color');
            $data['product_size']=$this->input->post('product_size');
            $data['product_condition']=$this->input->post('product_condition');

            if($this->input->post('product_design')!="")
            {
                $data['product_design']=implode(',',$this->input->post('product_design'));
            }
            else
            {
                $data['product_design']='';
            }
            if($this->input->post('product_grade')!="")
            {
                $data['product_grade']=implode(',',$this->input->post('product_grade'));
            }
            else
            {
                $data['product_grade']='';
            }

        }
        if (!empty($_FILES['product_image']['name'])) {
            $uploadPath = 'upload/product_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('product_image')) {
                $fileData = $this->upload->data();
                $data['product_image'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('product_image1'));

            }
        }
        else
        {
            $data['product_image'] =$this->input->post('product_image1');
        }
        $result=$this->product_model->update_product($data);
        if($result==1)
        {
            $this->session->set_userdata('update_product',"product Successfully Updated");
            redirect(base_url().'portal/product/manage_product');
        }
    }
    public function manage_product()
    {
        $data['products']=$this->product_model->show_all_product_by_user();
        $this->load->view('super_admin_view/product/view_manage_product',$data);
    }
    public function product_approve()
    {
        $data['products']=$this->product_model->show_all_product();
        $this->load->view('super_admin_view/product/view_approve_product',$data);
    }
    public function edit_product($product_id=0)
    {
        $data['categories']=$this->category_model->show_all_category();
        $data['designs']=$this->product_settings_model->show_active_product_design();
        $data['conditions']=$this->product_settings_model->show_active_product_condition();
        $data['grades']=$this->product_settings_model->show_active_product_grade();
        $data['product']=$this->product_model->select_product_by_product_id($product_id);
        $this->load->view('super_admin_view/product/view_edit_product',$data);
    }
    public function delete_product($product_id=0)
    {
        $result=$this->product_model->delete_product($product_id);
        if($result=='1')
        {
            redirect(base_url().'portal/product/manage_product');
        }
    }


    public function active_product($product_id=0)
    {
        $this->product_model->active_product($product_id);
        redirect(base_url().'portal/product/product_approve');
    }
    public function block_product($product_id=0)
    {
        $this->product_model->block_product($product_id);
        redirect(base_url().'portal/product/product_approve');
    }
}
