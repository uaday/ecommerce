<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_tab_model extends CI_Model {


    public function select_home_tab()
    {
        $sql="SELECT * from tbl_home_tab";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_home_tab($data)
    {
        $data1 = array(
            'bn_home_tab_header' =>  $data['bn_home_tab_header'],
            'en_home_tab_header' =>  $data['en_home_tab_header'],
            'bn_home_tab_text' => $data['bn_home_tab_text'],
            'en_home_tab_text' => $data['en_home_tab_text'],
            'image' => $data['home_tab_image']
        );
        $this->db->where('home_tab_id', $data['home_tab_id']);
        $this->db->update('tbl_home_tab', $data1);
        return 1;
    }
    public function select_home_tab_by_home_tab_id($home_tab_id)
    {
        $sql="SELECT * from tbl_home_tab WHERE home_tab_id='$home_tab_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
}