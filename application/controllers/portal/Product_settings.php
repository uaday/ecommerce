<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_settings extends CI_Controller {

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
//        $this->load->view('super_admin_view/master');
        $this->load->view('super_admin_view/product_design/view_add_product_design');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function product_design()
    {
        $data['product_designs']=$this->product_settings_model->show_all_product_design();
        $this->load->view('super_admin_view/product_settings/product_design',$data);
    }


    public function add_new_product_design()
    {
        $data['product_design_name']=$this->input->post('product_design_name');
        $data['status']='1';
        if ($this->form_validation->run('product_design'))
        {
            $result=$this->product_settings_model->add_new_product_design($data);
            if($result=='1')
            {
                $this->session->set_userdata('product_design','Product Design Name Successfully Added');
                redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
            }
        }
        else
        {
            $this->session->set_userdata('product_design_error',validation_errors());
            redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
        }

    }

    public function edit_product_design_details()
    {
        $product_design_id=$this->input->post('product_design_id');
        $product_design_name=$this->input->post('product_design_name');
        $result=$this->product_settings_model->edit_product_design($product_design_id,$product_design_name);
        if($result==0)
        {
            $this->session->set_userdata('product_design_error','This Product Design Name is Already Available');
            redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
        }
        else
        {
            $this->session->set_userdata('product_design','Product Design Successfully Updated');
            redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
        }
    }
    public function manage_product_design()
    {
        $data['product_designs']=$this->product_design_model->show_all_product_design();

        $this->load->view('super_admin_view/product_design/view_manage_product_design',$data);
    }
    public function edit_product_design($product_design_id=0)
    {
        $data['product_designs']=$this->product_design_model->select_product_design_by_product_design_id($product_design_id);
        $this->load->view('super_admin_view/product_design/view_edit_product_design',$data);
    }
    public function delete_product_design($product_design_id=0)
    {
        $result=$this->product_settings_model->delete_product_design($product_design_id);
        if($result=='1')
        {
            redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
        }
    }


    public function active_product_design($product_design_id=0)
    {
        $this->product_settings_model->active_product_design($product_design_id);
        redirect(base_url() . 'portal/product_settings/product_design', 'refresh');
    }
    public function block_product_design($product_design_id=0)
    {
        $this->product_settings_model->block_product_design($product_design_id);
        redirect(base_url().'portal/product_settings/product_design');
    }


    public function product_condition()
    {
        $data['product_conditions']=$this->product_settings_model->show_all_product_condition();
        $this->load->view('super_admin_view/product_settings/view_product_condition',$data);
    }


    public function add_new_product_condition()
    {
        $data['product_condition_name']=$this->input->post('product_condition_name');
        $data['status']='1';
        if ($this->form_validation->run('product_condition'))
        {
            $result=$this->product_settings_model->add_new_product_condition($data);
            if($result=='1')
            {
                $this->session->set_userdata('product_condition','Product Design Name Successfully Added');
                redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
            }
        }
        else
        {
            $this->session->set_userdata('product_condition_error',validation_errors());
            redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
        }

    }

    public function edit_product_condition_details()
    {
        $product_condition_id=$this->input->post('product_condition_id');
        $product_condition_name=$this->input->post('product_condition_name');
        $result=$this->product_settings_model->edit_product_condition($product_condition_id,$product_condition_name);
        if($result==0)
        {
            $this->session->set_userdata('product_condition_error','This Product Design Name is Already Available');
            redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
        }
        else
        {
            $this->session->set_userdata('product_condition','Product Design Successfully Updated');
            redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
        }
    }
    public function manage_product_condition()
    {
        $data['product_conditions']=$this->product_condition_model->show_all_product_condition();

        $this->load->view('super_admin_view/product_condition/view_manage_product_condition',$data);
    }
    public function edit_product_condition($product_condition_id=0)
    {
        $data['product_conditions']=$this->product_condition_model->select_product_condition_by_product_condition_id($product_condition_id);
        $this->load->view('super_admin_view/product_condition/view_edit_product_condition',$data);
    }
    public function delete_product_condition($product_condition_id=0)
    {
        $result=$this->product_settings_model->delete_product_condition($product_condition_id);
        if($result=='1')
        {
            redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
        }
    }


    public function active_product_condition($product_condition_id=0)
    {
        $this->product_settings_model->active_product_condition($product_condition_id);
        redirect(base_url() . 'portal/product_settings/product_condition', 'refresh');
    }
    public function block_product_condition($product_condition_id=0)
    {
        $this->product_settings_model->block_product_condition($product_condition_id);
        redirect(base_url().'portal/product_settings/product_condition');
    }


    public function product_grade()
    {
        $data['product_grades']=$this->product_settings_model->show_all_product_grade();
        $this->load->view('super_admin_view/product_settings/view_product_grade',$data);
    }


    public function add_new_product_grade()
    {
        $data['product_grade_name']=$this->input->post('product_grade_name');
        $data['status']='1';
        if ($this->form_validation->run('product_grade'))
        {
            $result=$this->product_settings_model->add_new_product_grade($data);
            if($result=='1')
            {
                $this->session->set_userdata('product_grade','Product Design Name Successfully Added');
                redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
            }
        }
        else
        {
            $this->session->set_userdata('product_grade_error',validation_errors());
            redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
        }

    }

    public function edit_product_grade_details()
    {
        $product_grade_id=$this->input->post('product_grade_id');
        $product_grade_name=$this->input->post('product_grade_name');
        $result=$this->product_settings_model->edit_product_grade($product_grade_id,$product_grade_name);
        if($result==0)
        {
            $this->session->set_userdata('product_grade_error','This Product Design Name is Already Available');
            redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
        }
        else
        {
            $this->session->set_userdata('product_grade','Product Design Successfully Updated');
            redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
        }
    }
    public function manage_product_grade()
    {
        $data['product_grades']=$this->product_grade_model->show_all_product_grade();

        $this->load->view('super_admin_view/product_grade/view_manage_product_grade',$data);
    }
    public function edit_product_grade($product_grade_id=0)
    {
        $data['product_grades']=$this->product_grade_model->select_product_grade_by_product_grade_id($product_grade_id);
        $this->load->view('super_admin_view/product_grade/view_edit_product_grade',$data);
    }
    public function delete_product_grade($product_grade_id=0)
    {
        $result=$this->product_settings_model->delete_product_grade($product_grade_id);
        if($result=='1')
        {
            redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
        }
    }


    public function active_product_grade($product_grade_id=0)
    {
        $this->product_settings_model->active_product_grade($product_grade_id);
        redirect(base_url() . 'portal/product_settings/product_grade', 'refresh');
    }
    public function block_product_grade($product_grade_id=0)
    {
        $this->product_settings_model->block_product_grade($product_grade_id);
        redirect(base_url().'portal/product_settings/product_grade','refresh');
    }


}
