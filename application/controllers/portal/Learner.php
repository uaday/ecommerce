<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learner extends CI_Controller {

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
        $this->load->view('super_admin_view/learner/view_bulk_learner');
//        $this->load->view('super_admin_view/login_register/view_login');
    }
    public function add_learner()
    {
        $this->load->view('super_admin_view/learner/view_bulk_learner');
    }

    public function learner_bulk_upload_file()
    {

        $result=$this->learner_model->upload_learner_file();
        if($result)
        {
            $this->session->set_userdata('upload_data','Upload Data Successful');
            redirect(base_url().'portal/learner');
        }

    }


    public function add_new_learner()
    {
        $data['bn_learner_name']=$this->input->post('bn_learner_name');
        $data['en_learner_name']=$this->input->post('en_learner_name');
        if (!empty($_FILES['learner_image']['name'])) {
            $uploadPath = 'upload/learner_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('learner_image')) {
                $fileData = $this->upload->data();
                $data['learner_image'] = $uploadPath.$fileData['file_name'];
                $result=$this->learner_model->add_new_learner($data);
                if($result==1)
                {
                    $this->session->set_userdata('add_new_learner',"learner Successfully Added");
                    redirect(base_url().'portal/learner/manage_learner');
                }
            }
        }
    }
    public function edit_learner_details()
    {
        $data['learner_id']=$this->input->post('learner_id');
        $data['learner_name']=$this->input->post('learner_name');
        $data['mobile_number']=$this->input->post('mobile_number');
        $data['father_name']=$this->input->post('father_name');
        $data['gender']=$this->input->post('gender');
        $data['present_address']=$this->input->post('present_address');
        $data['photo']=$this->input->post('photo1');
        if (!empty($_FILES['photo']['name'])) {
            $uploadPath = 'upload/learner_image/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo')) {
                $fileData = $this->upload->data();
                $data['photo'] = $uploadPath.$fileData['file_name'];
                unlink($this->input->post('photo1'));

            }
        }
        else
        {
            $data['photo'] =$this->input->post('photo1');
        }
        $result=$this->learner_model->update_learner($data);
        if($result==1)
        {
            $this->session->set_userdata('update_learner',"learner Successfully Updated");
            redirect(base_url().'portal/learner/manage_learner');
        }
    }
    public function manage_learner()
    {
        $data['learners']=$this->learner_model->show_all_learner();
        $this->load->view('super_admin_view/learner/view_manage_learner',$data);
    }
    public function edit_learner($learner_id=0)
    {
        $data['learner_details']=$this->learner_model->select_learner_by_learner_id($learner_id);
        $this->load->view('super_admin_view/learner/view_edit_learner',$data);
    }
    public function delete_learner($learner_id=0)
    {
        $result=$this->learner_model->delete_learner($learner_id);
        if($result=='1')
        {
            redirect(base_url().'portal/learner/manage_learner');
        }
    }


    public function active_learner($learner_id=0)
    {
        $this->learner_model->active_learner($learner_id);
        redirect(base_url().'portal/learner/manage_learner');
    }
    public function block_learner($learner_id=0)
    {
        $this->learner_model->block_learner($learner_id);
        redirect(base_url().'portal/learner/manage_learner');
    }
}
