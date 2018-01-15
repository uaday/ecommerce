<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_end_contact_model extends CI_Model {

    public function add_new_message($data)
    {
        $result=$this->db->insert('tbl_contact', $data);
        if($result)
        {
            return 1;
        }
    }

    public function show_all_message()
    {
        $result=$this->db->query("SELECT * FROM tbl_contact WHERE status='1' ORDER BY contact_id DESC ");
        return $result->result_array();
    }


}