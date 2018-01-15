<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model {


    public function show_all_slider()
    {
        $sql="SELECT * from tbl_slider";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_slider_by_slider_id($slider_id)
    {
        $sql="SELECT * from tbl_slider WHERE slider_id='$slider_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_slider($data)
    {
        $data1 = array(
            'bn_slider_header' =>  $data['bangla_slider_header'],
            'en_slider_header' =>  $data['english_slider_header'],
            'bn_slider_text' => $data['bangla_slider_text'],
            'en_slider_text' => $data['english_slider_text'],
            'image' => $data['slider_image'],
            'status' => '1'
        );
        $this->db->insert('tbl_slider', $data1);
        return 1;
    }
    public function update_slider($data)
    {
        $data1 = array(
            'bn_slider_header' =>  $data['bangla_slider_header'],
            'en_slider_header' =>  $data['english_slider_header'],
            'bn_slider_text' => $data['bangla_slider_text'],
            'en_slider_text' => $data['english_slider_text'],
            'image' => $data['slider_image'],
            'status' => '1'
        );
        $this->db->where('slider_id', $data['slider_id']);
        $this->db->update('tbl_slider', $data1);
        return 1;
    }

    public function block_slider($slider_id)
    {
        $sql="UPDATE tbl_slider SET status='0' WHERE slider_id='$slider_id'";
        $this->db->query($sql);
    }
    public function active_slider($slider_id)
    {
        $sql="UPDATE tbl_slider SET status='1' WHERE slider_id='$slider_id'";
        $this->db->query($sql);
    }
    public function delete_slider($slider_id)
    {
        $sql="SELECT * from tbl_slider WHERE slider_id='$slider_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['image']);
        $this->db->delete('tbl_slider', array('slider_id' => $slider_id));
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