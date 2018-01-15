<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice_model extends CI_Model {


    public function show_all_notice()
    {
        $sql="SELECT * from tbl_notice";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_notice_by_notice_id($notice_id)
    {
        $sql="SELECT * from tbl_notice WHERE notice_id='$notice_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_notice($data)
    {
        $date=date("Y-m-d");
        $data1 = array(
            'bn_notice_header' =>  $data['bn_notice_header'],
            'en_notice_header' =>  $data['en_notice_header'],
            'bn_notice_text' => $data['bn_notice_text'],
            'en_notice_text' => $data['en_notice_text'],
            'image' => $data['notice_image'],
            'post_date'=>$date,
            'status' => '1'
        );
        $this->db->insert('tbl_notice', $data1);
        return 1;
    }
    public function update_notice($data)
    {
        $data1 = array(
            'bn_notice_header' =>  $data['bangla_notice_header'],
            'en_notice_header' =>  $data['english_notice_header'],
            'bn_notice_text' => $data['bangla_notice_text'],
            'en_notice_text' => $data['english_notice_text'],
            'image' => $data['notice_image'],
            'status' => '1'
        );
        $this->db->where('notice_id', $data['notice_id']);
        $this->db->update('tbl_notice', $data1);
        return 1;
    }

    public function block_notice($notice_id)
    {
        $sql="UPDATE tbl_notice SET status='0' WHERE notice_id='$notice_id'";
        $this->db->query($sql);
    }
    public function active_notice($notice_id)
    {
        $sql="UPDATE tbl_notice SET status='1' WHERE notice_id='$notice_id'";
        $this->db->query($sql);
    }
    public function delete_notice($notice_id)
    {
        $sql="SELECT * from tbl_notice WHERE notice_id='$notice_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['image']);
        $this->db->delete('tbl_notice', array('notice_id' => $notice_id));
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