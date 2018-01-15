<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function add_into_invoice($name)
    {
        $datee=date('Y-m-d');
        $data = array(
            'user_name' =>  $name,
            'invoice_date' =>  $datee,
            'status' => '1'
        );
        $this->db->insert('tbl_invoice', $data);
        $cid = $this->db->insert_id();
        return $cid;
    }
    public function add_product_in_cart($data)
    {
        $this->db->insert('tbl_product_transaction', $data);
        return 1;
    }
    public function show_request_by_mcp_id($mcp_id)
    {
        $sql="SELECT * from tbl_product_transaction t,tbl_product p WHERE mcp_id='$mcp_id' AND p.product_id=t.product_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
}