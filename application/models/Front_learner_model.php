<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_learner_model extends CI_Model {


    public function show_all_learner($limit, $offset)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('status', '1');
        $this->db->from('tbl_user_learner');
        $result['num_rows'] = $this->db->count_all_results();
        $result['rows']=$this->db->get_where('tbl_user_learner', array('status' => '1'), $limit, $offset);
        return $result;
    }

    public function search_learner($limit, $offset,$search_word)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }


        $this->db->where('status', '1');
        $this->db->like('learner_name', $search_word);
        $this->db->from('tbl_user_learner');
        $result['num_rows'] = $this->db->count_all_results();
        $result['rows']=$this->db->query("SELECT * FROM tbl_user_learner WHERE (learner_name LIKE '%$search_word%') AND status='1'   LIMIT $offset,$limit");
        return $result;
    }

    public function find_learner_by_learner_id($learner_id)
    {
        $result=$this->db->get_where('tbl_user_learner', array('learner_id' => $learner_id));
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