<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {


    public function show_slider()
    {
        $sql="SELECT * from tbl_slider WHERE status=1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_mcp()
    {
        $sql="SELECT count(DISTINCT ID) as total_mcp from tbl_user_mcp WHERE status=1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_learner()
    {
        $sql="SELECT count(DISTINCT id) as total_learner from tbl_user_learner WHERE status=1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_product()
    {
        $sql="SELECT count(DISTINCT product_id) as total_product from tbl_product WHERE status=1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_request_product()
    {
        $sql="SELECT count(DISTINCT product_id) as total_request_product from tbl_product WHERE status=0";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

}