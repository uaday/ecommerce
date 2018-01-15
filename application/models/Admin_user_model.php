<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_user_model extends CI_Model {


    public function show_all_admin_user()
    {
        $sql="SELECT * from tbl_login WHERE user_type='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function add_new_admin_user($data)
    {
        $this->db->insert('tbl_login', $data);
        return 1;
    }


    public function show_active_product_design()
    {
        $sql="SELECT * from tbl_login WHERE status='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_product_design_by_product_design_id($product_design_id)
    {
        $sql="SELECT * from tbl_login WHERE product_design_id='$product_design_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_product_design($data)
    {
        $this->db->insert('tbl_login', $data);
        return 1;
    }

    public function edit_admin_user($data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_login', $data);
    }


    public function block_admin_user($user_id)
    {
        $sql="UPDATE tbl_login SET status='0' WHERE user_id='$user_id'";
        $this->db->query($sql);
    }
    public function active_admin_user($user_id)
    {
        $sql="UPDATE tbl_login SET status='1' WHERE user_id='$user_id'";
        $this->db->query($sql);
    }
    public function delete_product_design($product_design_id)
    {
        $this->db->delete('tbl_login', array('product_design_id' => $product_design_id));
        return 1;
    }


    public function show_all_product_condition()
    {
        $sql="SELECT * from tbl_product_condition";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_active_product_condition()
    {
        $sql="SELECT * from tbl_product_condition WHERE status='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_product_condition_by_product_condition_id($product_condition_id)
    {
        $sql="SELECT * from tbl_product_condition WHERE product_condition_id='$product_condition_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }


    public function edit_product_condition($product_condition_id,$product_condition_name)
    {
        $sql1="SELECT * FROM tbl_product_condition WHERE product_condition_name='$product_condition_name' AND product_condition_id <> '$product_condition_id'";
        $result=$this->db->query($sql1);
        if($result->num_rows()>0)
        {
            return 0;
        }
        else
        {
            $sql2="UPDATE tbl_product_condition SET product_condition_name='$product_condition_name' WHERE product_condition_id='$product_condition_id'";
            $this->db->query($sql2);
            return 1;
        }
    }




    public function block_product_condition($product_condition_id)
    {
        $sql="UPDATE tbl_product_condition SET status='0' WHERE product_condition_id='$product_condition_id'";
        $this->db->query($sql);
    }
    public function active_product_condition($product_condition_id)
    {
        $sql="UPDATE tbl_product_condition SET status='1' WHERE product_condition_id='$product_condition_id'";
        $this->db->query($sql);
    }
    public function delete_product_condition($product_condition_id)
    {
        $this->db->delete('tbl_product_condition', array('product_condition_id' => $product_condition_id));
        return 1;
    }


    public function show_all_product_grade()
    {
        $sql="SELECT * from tbl_product_grade";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_active_product_grade()
    {
        $sql="SELECT * from tbl_product_grade WHERE status='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_product_grade_by_product_grade_id($product_grade_id)
    {
        $sql="SELECT * from tbl_product_grade WHERE product_grade_id='$product_grade_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_product_grade($data)
    {
        $this->db->insert('tbl_product_grade', $data);
        return 1;
    }

    public function edit_product_grade($product_grade_id,$product_grade_name)
    {
        $sql1="SELECT * FROM tbl_product_grade WHERE product_grade_name='$product_grade_name' AND product_grade_id <> '$product_grade_id'";
        $result=$this->db->query($sql1);
        if($result->num_rows()>0)
        {
            return 0;
        }
        else
        {
            $sql2="UPDATE tbl_product_grade SET product_grade_name='$product_grade_name' WHERE product_grade_id='$product_grade_id'";
            $this->db->query($sql2);
            return 1;
        }
    }




    public function block_product_grade($product_grade_id)
    {
        $sql="UPDATE tbl_product_grade SET status='0' WHERE product_grade_id='$product_grade_id'";
        $this->db->query($sql);
    }
    public function active_product_grade($product_grade_id)
    {
        $sql="UPDATE tbl_product_grade SET status='1' WHERE product_grade_id='$product_grade_id'";
        $this->db->query($sql);
    }
    public function delete_admin_user($user_id)
    {
        $this->db->delete('tbl_login', array('user_id' => $user_id));
        return 1;
    }



}