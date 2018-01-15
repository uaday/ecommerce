<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 10/11/2017
 * Time: 12:25 PM
 */
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {


    public function show_all_product()
    {
        $sql="SELECT * from tbl_product";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_all_product_by_user()
    {
        $user_id=$this->session->userdata('user_id');
        $sql="SELECT * from tbl_product WHERE user_id='$user_id' ORDER BY product_id DESC ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_product_by_product_id($product_id)
    {
        $sql="SELECT * from tbl_product WHERE product_id='$product_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_product($data)
    {
        $date=date("Y/m/d");
        $time=date("h:i:s");
        $data1 = array(
            'service' =>  $data['service'],
            'product_name' =>  $data['product_name'],
            'product_description' =>  $data['p_s_description'],
            'product_material' =>  $data['product_material'],
            'product_color' => $data['product_color'],
            'product_size' =>  $data['product_size'],
            'product_price' => $data['product_price'],
            'product_design' =>  $data['product_design'],
            'product_condition' => $data['product_condition'],
            'automatic_grade' =>  $data['product_grade'],
            'tbl_category_category_id' => $data['product_category'],
            'user_id' =>  $this->session->userdata('user_id'),
            'product_photo' => $data['product_image'],
            'product_create_date' =>  $date,
            'product_create_time' => $time,
            'status' => '0'
        );
        $this->db->insert('tbl_product', $data1);
        return 1;
    }
    public function update_product($data)
    {
        $data1 = array(
            'service' =>  $data['service'],
            'product_name' =>  $data['product_name'],
            'product_description' =>  $data['p_s_description'],
            'product_material' =>  $data['product_material'],
            'product_color' => $data['product_color'],
            'product_size' =>  $data['product_size'],
            'product_price' => $data['product_price'],
            'product_design' =>  $data['product_design'],
            'product_condition' => $data['product_condition'],
            'automatic_grade' =>  $data['product_grade'],
            'tbl_category_category_id' => $data['product_category'],
            'product_photo' => $data['product_image'],
            'status' => '1'
        );

        $this->db->where('product_id', $data['product_id']);
        $result=$this->db->update('tbl_product', $data1);
        return 1;
    }

    public function block_product($product_id)
    {
        $sql="UPDATE tbl_product SET status='0' WHERE product_id='$product_id'";
        $this->db->query($sql);
    }
    public function active_product($product_id)
    {
        $sql="UPDATE tbl_product SET status='1' WHERE product_id='$product_id'";
        $this->db->query($sql);
    }
    public function delete_product($product_id)
    {
        $sql="SELECT * from tbl_product WHERE product_id='$product_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['product_photo']);
        $this->db->delete('tbl_product', array('product_id' => $product_id));
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
