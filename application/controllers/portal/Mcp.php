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
        $this->load->view('super_admin_view/mcp/view_bulk_mcp');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function add_mcp()
    {
        $this->load->view('super_admin_view/mcp/view_bulk_mcp');
    }

    public function mcp_bulk_upload_file()
    {

        $result=$this->mcp_model->upload_mcp_file();
        if($result)
        {
            $this->session->set_userdata('upload_data','Upload Data Successful');
            redirect(base_url().'portal/mcp');
        }

    }


    public function add_new_mcp()
    {
        $data['bn_mcp_name']=$this->input->post('bn_mcp_name');
        $data['en_mcp_name']=$this->input->post('en_mcp_name');
        if (!empty($_FILES['mcp_image']['name'])) {
            $uploadPath = 'upload/mcp_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('mcp_image')) {
                $fileData = $this->upload->data();
                $data['mcp_image'] = $uploadPath.$fileData['file_name'];
                $result=$this->mcp_model->add_new_mcp($data);
                if($result==1)
                {
                    $this->session->set_userdata('add_new_mcp',"mcp Successfully Added");
                    redirect(base_url().'portal/mcp/manage_mcp');
                }
            }
        }
    }
    public function edit_mcp_details()
    {
        $data['mcp_id']=$this->input->post('mcp_id');
        $data['mcp_name']=$this->input->post('mcp_name');
        $data['shop_address']=$this->input->post('shop_address');
        $data['shop_name']=$this->input->post('shop_name');
        $data['product']=$this->input->post('product');
        $data['phone_number']=$this->input->post('phone_number');
        $data['photo1']=$this->input->post('photo1');
        $data['photo2']=$this->input->post('photo2');
        if (!empty($_FILES['photo']['name'])) {
            $uploadPath = 'upload/mcp_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo')) {
                $fileData = $this->upload->data();
                $data['mcp_image'] = $uploadPath.$fileData['file_name'];
                if($data['photo1']!=null)
                {
                    unlink($this->input->post('photo1'));
                }

            }
        }
        else
        {
            $data['mcp_image'] =$this->input->post('photo1');
        }
        if (!empty($_FILES['shop_photo']['name'])) {
            $uploadPath = 'upload/shop_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('shop_photo')) {
                $fileData = $this->upload->data();
                $data['shop_image'] = $uploadPath.$fileData['file_name'];
                if($data['photo2']!=null)
                {
                    unlink($this->input->post('photo2'));
                }

            }
        }
        else
        {
            $data['shop_image'] =$this->input->post('photo2');
        }
        $result=$this->mcp_model->update_mcp($data);
        if($result==1)
        {
            $this->session->set_userdata('update_mcp',"mcp Successfully Updated");
            redirect(base_url().'portal/mcp/manage_mcp');
        }
    }
    public function manage_mcp()
    {
        $data['mcps']=$this->mcp_model->show_all_mcp();
        $this->load->view('super_admin_view/mcp/view_manage_mcp',$data);
    }
    public function edit_mcp($mcp_id=0)
    {
        $data['mcp_details']=$this->mcp_model->select_mcp_by_mcp_id($mcp_id);
        $this->load->view('super_admin_view/mcp/view_edit_mcp',$data);
    }
    public function delete_mcp($mcp_id=0)
    {
        $result=$this->mcp_model->delete_mcp($mcp_id);
        if($result=='1')
        {
            redirect(base_url().'portal/mcp/manage_mcp');
        }
    }


    public function active_mcp($mcp_id=0)
    {
        $this->mcp_model->active_mcp($mcp_id);
        redirect(base_url().'portal/mcp/manage_mcp');
    }
    public function block_mcp($mcp_id=0)
    {
        $this->mcp_model->block_mcp($mcp_id);
        redirect(base_url().'portal/mcp/manage_mcp');
    }
}
