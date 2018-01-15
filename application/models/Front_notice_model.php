<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_notice_model extends CI_Model {


    public function show_all_notice($limit, $offset)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('status', '1');
        $this->db->from('tbl_notice');
        $result['num_rows'] = $this->db->count_all_results();
        $result['rows']=$this->db->get_where('tbl_notice', array('status' => '1'), $limit, $offset);
        return $result;
    }

    public function find_notice_by_notice_id($notice_id)
    {
        $result=$this->db->get_where('tbl_notice', array('notice_id' => $notice_id));
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