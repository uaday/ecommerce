<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_body_model extends CI_Model {


    public function select_home_body()
    {
        $sql="SELECT * from tbl_home_body ORDER by home_body_id ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_home_body($data)
    {

        $data['bn_body_header']=$this->input->post('bn_body_header');
        $data['en_body_header']=$this->input->post('en_body_header');
        $data['bn_body_text']=$this->input->post('bn_body_text');
        $data['en_body_text']=$this->input->post('en_body_text');
        $data1 = array(
            'bn_body_header' =>  $data['bn_body_header'],
            'en_body_header' =>  $data['en_body_header'],
            'bn_body_text' => $data['bn_body_text'],
            'en_body_text' => $data['en_body_text']
        );
        $this->db->where('home_body_id', $data['home_body_id']);
        $this->db->update('tbl_home_body', $data1);
        return 1;
    }
}