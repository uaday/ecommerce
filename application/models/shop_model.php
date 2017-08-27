<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model {


    public function total_drug()
    {
        $sql="SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function create_shop($data)
    {
        $data = array(
            'shop_owner' => $data['shop_owner'],
            'address' =>  $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'shop_name' => $data['shop_name'],
            'opening_time' => $data['opening_time'],
            'country' => $data['country'],
            'region' => $data['region'],
            'language' => $data['language'],
            'currency' => $data['currency'],
            'status' => '1',
            'tbl_login_login_id'=>'1'
        );

        $this->db->insert('tbl_shop', $data);
        return 1;
    }
    public function show_all_shop_by_user($login_id)
    {
        $sql="SELECT * FROM tbl_shop WHERE tbl_login_login_id='$login_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

}