<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_mcp_model extends CI_Model {


    public function show_all_mcp($limit, $offset)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('status', '1');
        $this->db->from('tbl_user_mcp');
        $result['num_rows'] = $this->db->count_all_results();
        $result['rows']=$this->db->get_where('tbl_user_mcp', array('status' => '1'), $limit, $offset);
        return $result;
    }

    public function find_mcp_by_mcp_id($mcp_id)
    {
        $result=$this->db->get_where('tbl_user_mcp', array('mcp_id' => $mcp_id));
        return $result->result_array();
    }
    public function find_learner_by_mcp_id($mcp_id)
    {
        $result=$this->db->get_where('tbl_user_learner', array('mcp_id' => $mcp_id));
        return $result;
    }

    public function show_all_product_by_mcp_id($mcp_id)
    {
        $sql="SELECT * from tbl_product WHERE user_id='$mcp_id' ORDER BY product_id DESC ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result;
    }

    public function search_mcp($limit, $offset,$search_word)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }


        $this->db->where('status', '1');
        $this->db->like('mcp_name', $search_word);
        $this->db->from('tbl_user_mcp');
        $result['num_rows'] = $this->db->count_all_results();
        $result['rows']=$this->db->query("SELECT * FROM tbl_user_mcp WHERE (mcp_name LIKE '%$search_word%') AND status='1'   LIMIT $offset,$limit");
        return $result;
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