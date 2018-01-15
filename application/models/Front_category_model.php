<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_category_model extends CI_Model {


    public function show_all_active_category()
    {
        $sql="SELECT * from tbl_category WHERE status='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_category_by_category_id($category_id)
    {
        $sql="SELECT * from tbl_category WHERE category_id='$category_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_category($data)
    {
        $data1 = array(
            'bn_category_name' =>  $data['bn_category_name'],
            'en_category_name' =>  $data['en_category_name'],
            'image' => $data['category_image'],
            'status' => '1'
        );
        $this->db->insert('tbl_category', $data1);
        return 1;
    }
    public function update_category($data)
    {
        $data1 = array(
            'bn_category_name' =>  $data['bangla_category_name'],
            'en_category_name' =>  $data['english_category_name'],
            'image' => $data['category_image'],
            'status' => '1'
        );
        $this->db->where('category_id', $data['category_id']);
        $this->db->update('tbl_category', $data1);
        return 1;
    }

    public function block_category($category_id)
    {
        $sql="UPDATE tbl_category SET status='0' WHERE category_id='$category_id'";
        $this->db->query($sql);
    }
    public function active_category($category_id)
    {
        $sql="UPDATE tbl_category SET status='1' WHERE category_id='$category_id'";
        $this->db->query($sql);
    }
    public function delete_category($category_id)
    {
        $sql="SELECT * from tbl_category WHERE category_id='$category_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['image']);
        $this->db->delete('tbl_category', array('category_id' => $category_id));
        return 1;
    }

    public function show_all_shop_by_user($user_id)
    {
        $sql="SELECT * FROM tbl_shop WHERE tbl_login_user_id='$user_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_all_request_shop()
    {
        $sql="SELECT * FROM tbl_shop WHERE status!='3'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_all_online_shop()
    {
        $sql="SELECT * FROM tbl_shop WHERE status='3'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function pending_shop_by_shop_id($shop_id)
    {
        $data = array(
            'status' => '1'
        );

        $this->db->where('shop_id', $shop_id);
        if($this->db->update('tbl_shop', $data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function processing_shop_by_shop_id($shop_id)
    {
        $data = array(
            'status' => '2'
        );

        $this->db->where('shop_id', $shop_id);
        if($this->db->update('tbl_shop', $data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function accept_shop_by_shop_id($shop_id)
    {
        $data = array(
            'status' => '3'
        );

        $this->db->where('shop_id', $shop_id);
        if($this->db->update('tbl_shop', $data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

}