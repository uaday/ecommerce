<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_product_model extends CI_Model {


    public function show_all_product($limit, $offset)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('status', '1');
        $this->db->from('tbl_product');
        $result['num_rows'] = $this->db->count_all_results();
        if($this->session->userdata('sort')=='2')
        {
            $result['rows']=$this->db->order_by('product_create_date','ASC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        else if($this->session->userdata('sort')=='3')
        {
            $result['rows']=$this->db->order_by('product_price','DESC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        else if($this->session->userdata('sort')=='4')
        {
            $result['rows']=$this->db->order_by('product_price','ASC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        else if($this->session->userdata('sort')=='5')
        {
            $result['rows']=$this->db->order_by('service','ASC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        else if($this->session->userdata('sort')=='6')
        {
            $result['rows']=$this->db->order_by('service','DESC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        else
        {
            $result['rows']=$this->db->order_by('product_create_date','DESC')->get_where('tbl_product', array('status' => '1'), $limit, $offset);
        }
        return $result;
    }
    public function show_all_product_by_category($limit, $offset,$category_id)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }

        $data1 = array(
            'tbl_category_category_id' => $category_id,
            'status' => '1'
        );

        $this->db->where('status', '1');
        $this->db->from('tbl_product');
        $result['num_rows'] = $this->db->count_all_results();
        if($this->session->userdata('sort')=='1')
        {
            $result['rows']=$this->db->order_by('product_create_date','DESC')->get_where('tbl_product', $data1, $limit, $offset);
        }
        else
        {
            $result['rows']=$this->db->order_by('product_create_date','ASC')->get_where('tbl_product', $data1, $limit, $offset);
        }
        return $result;
    }
    public function search_product_with_category($limit, $offset,$search_word,$category_id)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }

        $data1 = array(

            'tbl_category_category_id' => $category_id,
            'status' => '1'
        );

        $this->db->where('status', '1');
        $this->db->from('tbl_product');
        $result['num_rows'] = $this->db->count_all_results();
        if($this->session->userdata('sort')=='1')
        {
//            $result['rows']=$this->db->order_by('product_create_date','DESC')->get_where('tbl_product', $data1, $limit, $offset);
            $result['rows']=$this->db->query("SELECT * FROM tbl_product WHERE tbl_category_category_id='$category_id' AND (product_name LIKE '%$search_word%' OR product_color LIKE '%$search_word%' OR product_material LIKE '%$search_word%') AND status='1'  ORDER BY product_create_date DESC LIMIT $offset,$limit");
        }
        else
        {
//            $result['rows']=$this->db->order_by('product_create_date','ASC')->get_where('tbl_product', $data1, $limit, $offset);
            $result['rows']=$this->db->query("SELECT * FROM tbl_product WHERE tbl_category_category_id='$category_id' AND (product_name LIKE '%$search_word%' OR product_color LIKE '%$search_word%' OR product_material LIKE '%$search_word%') AND status='1'  ORDER BY product_create_date ASC LIMIT $offset,$limit");
        }
        return $result;
    }
    public function search_product($limit, $offset,$search_word)
    {
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }


        $this->db->where('status', '1');
        $this->db->from('tbl_product');
        $result['num_rows'] = $this->db->count_all_results();
        if($this->session->userdata('sort')=='1')
        {
//            $result['rows']=$this->db->order_by('product_create_date','DESC')->get_where('tbl_product', $data1, $limit, $offset);
            $result['rows']=$this->db->query("SELECT * FROM tbl_product WHERE (product_name LIKE '%$search_word%' OR product_color LIKE '%$search_word%' OR product_material LIKE '%$search_word%') AND status='1'  ORDER BY product_create_date DESC LIMIT $offset,$limit");
        }
        else
        {
//            $result['rows']=$this->db->order_by('product_create_date','ASC')->get_where('tbl_product', $data1, $limit, $offset);
            $result['rows']=$this->db->query("SELECT * FROM tbl_product WHERE (product_name LIKE '%$search_word%' OR product_color LIKE '%$search_word%' OR product_material LIKE '%$search_word%') AND status='1'  ORDER BY product_create_date ASC LIMIT $offset,$limit");
        }
        return $result;
    }
    public function select_product_by_product_id($product_id)
    {
        $sql="SELECT * from tbl_product p,tbl_user_mcp m WHERE m.mcp_id=p.user_id AND p.product_id='$product_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_related_by_id($product_id,$type,$category)
    {
        $sql="SELECT * from tbl_product p,tbl_user_mcp m WHERE m.mcp_id=p.user_id AND p.tbl_category_category_id='$category' AND p.service='$type' AND p.product_id!='$product_id' LIMIT 4";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_product($data)
    {
        $data1 = array(
            'bn_product_name' =>  $data['bn_product_name'],
            'en_product_name' =>  $data['en_product_name'],
            'image' => $data['product_image'],
            'status' => '1'
        );
        $this->db->insert('tbl_product', $data1);
        return 1;
    }
    public function update_product($data)
    {
        $data1 = array(
            'bn_product_name' =>  $data['bangla_product_name'],
            'en_product_name' =>  $data['english_product_name'],
            'image' => $data['product_image'],
            'status' => '1'
        );
        $this->db->where('product_id', $data['product_id']);
        $this->db->update('tbl_product', $data1);
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
        unlink($row['0']['image']);
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