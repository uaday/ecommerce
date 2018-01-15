<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mcp_model extends CI_Model
{


    public function total_drug()
    {
        $sql = "SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    public function upload_mcp_file1()
    {
        $check_array = array();
        $duplicate = array();
        $allowed = array('csv');
        $filename = $_FILES['mcp_bulk']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $this->session->set_userdata('error', 'Wrong File Format');
            redirect(base_url().'portal/mcp');
        } else {
            $sql = "SELECT mcp_id FROM tbl_user_mcp";
            $result = $this->db->query($sql);
            $k = 0;
            $fp = fopen($_FILES['mcp_bulk']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                if (count($csv_line) == 7) {
                    $insert_csv = array();

                    $insert_csv['mcp_name'] = $csv_line['0'];
                    $insert_csv['mcp_id'] = $csv_line['1'];
                    $insert_csv['product'] = $csv_line['2'];
                    $insert_csv['phone_number'] = $csv_line['3'];
                    $insert_csv['photo'] = $csv_line['4'];
                    $insert_csv['shop_name'] = $csv_line['5'];
                    $insert_csv['shop_address'] = $csv_line['6'];
                    if ($k != 0) {
                        $d_check = array_search($insert_csv['mcp_id'], $check_array);
                        if ($d_check > -1) {
                            array_push($duplicate, $insert_csv['mcp_id']);
                        } else {
                            array_push($check_array, $insert_csv['mcp_id']);
                            $val = substr($insert_csv['mobile_number'], 0, 1);
                            if ($val != 0) {
                                $insert_csv['mobile_number'] = '0' . $insert_csv['mobile_number'];
                            }
                            $key = array_search($insert_csv['mcp_id'], $this->array_column($result->result_array(), 'mcp_id'));
                            if ($key > -1) {
                                $sql1 = "UPDATE tbl_user_mcp SET mcp_id='$insert_csv[mcp_id]',mcp_name='$insert_csv[mcp_name]',mobile_number='$insert_csv[mobile_number]',father_name='$insert_csv[father_name]',gender='$insert_csv[gender]',photo='$insert_csv[photo]',present_address='$insert_csv[present_address]' WHERE mcp_id='$insert_csv[mcp_id]'";
                                $this->db->query($sql1);
                            } else {

                                $sql2 = "INSERT INTO tbl_user_mcp(mcp_id,mcp_name,mobile_number,father_name,gender,photo,present_address,status) VALUES ('$insert_csv[mcp_id]','$insert_csv[mcp_name]','$insert_csv[mobile_number]','$insert_csv[father_name]','$insert_csv[gender]','$insert_csv[photo]','$insert_csv[present_address]','1')";
                                $this->db->query($sql2);
                            }
                        }
                    }
                    $k++;
                } else {
                    $this->session->set_userdata('error', 'Wrong File Format');
                    redirect(base_url().'portal/mcp');
                }
            }
            fclose($fp) or die("can't close file");
            $this->session->set_userdata('duplicate', $duplicate);
            $data['success'] = "success";
            return $data;
        }
    }



    public function upload_mcp_file()
    {
        $check_array = array();
        $duplicate = array();
        $allowed = array('csv');
        $filename = $_FILES['mcp_bulk']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $this->session->set_userdata('error', 'Wrong File Format');
            redirect(base_url().'portal/mcp');
        } else {
            //Login User
            $sql = "SELECT user_id FROM tbl_login";
            $result = $this->db->query($sql);

            //Different User Type;
            $sql_sm = "SELECT mcp_id FROM tbl_user_mcp";
            $result_sm = $this->db->query($sql_sm);
            $k = 0;
            $fp = fopen($_FILES['mcp_bulk']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                ini_set('max_execution_time', 3000);
                if (count($csv_line) == 7) {
                    $insert_csv = array();
                    $insert_csv['mcp_name'] = $this->db->escape_str($csv_line['0']);
                    $insert_csv['mcp_id'] = $this->db->escape_str($csv_line['1']);
                    $insert_csv['product'] = $this->db->escape_str($csv_line['2']);
                    $insert_csv['phone_number'] = $this->db->escape_str($csv_line['3']);
                    $insert_csv['photo'] = $this->db->escape_str($csv_line['4']);
                    $insert_csv['shop_name'] = $this->db->escape_str($csv_line['5']);
                    $insert_csv['shop_address'] = $this->db->escape_str($csv_line['6']);
                    if ($k != 0) {
                        $d_check = array_search($csv_line[1],$check_array);
                        if ($d_check !=null) {
                            array_push($duplicate, $insert_csv['mcp_id']);
                        } else {
                            array_push($check_array, $insert_csv['mcp_id']);
                            $key = array_search($insert_csv['mcp_id'], $this->array_column($result->result_array(), 'user_id'));
                            $key_sm = array_search($insert_csv['mcp_id'], $this->array_column($result_sm->result_array(), 'mcp_id'));

                            if ($key > -1) {
                                if($key_sm > -1)
                                {
                                    $sql_mcp_update = "UPDATE tbl_user_mcp1 SET mcp_name='$insert_csv[mcp_name]',shop_name='$insert_csv[shop_name]',shop_address='$insert_csv[shop_address]' ,product='$insert_csv[product]',phone_number='$insert_csv[phone_number]',status='1' WHERE mcp_id='$insert_csv[mcp_id]'";
                                    $this->db->query($sql_mcp_update);
                                }
                                $sql_login = "UPDATE tbl_login SET user_id='$insert_csv[mcp_id]',name='$insert_csv[mcp_name]',user_type='2',phone_number='$insert_csv[phone_number]' WHERE user_id='$insert_csv[mcp_id]'";
                                $this->db->query($sql_login);
                            } else {
                                $user_password = 'welcome';
                                $sql_mcp_insert="INSERT INTO tbl_user_mcp1(mcp_id,mcp_name,shop_name,shop_address,product,phone_number,status) VALUES ('$insert_csv[mcp_id]','$insert_csv[mcp_name]','$insert_csv[shop_name]','$insert_csv[shop_address]','$insert_csv[product]','$insert_csv[phone_number]','1')";
                                $this->db->query($sql_mcp_insert);
                                $sql_login_insert = "INSERT INTO tbl_login(user_id,name,phone_number,password,user_type,status) VALUES ('$insert_csv[mcp_id]','$insert_csv[mcp_name]','$insert_csv[phone_number]',md5('$user_password'),'2','1')";
                                $this->db->query($sql_login_insert);
                            }
                        }
                    }
                    $k++;
                } else {
                    $this->session->set_userdata('error', 'Wrong File Format');
                    redirect(base_url().'portal/mcp');
                }
            }
            fclose($fp) or die("can't close file");
            $this->session->set_userdata('duplicate', $duplicate);
            $data['success'] = "success";
            return $data;
        }
    }



    public function array_column(array $input, $columnKey, $indexKey = null)
    {
        $array = array();
        foreach ($input as $value) {
            if (!array_key_exists($columnKey, $value)) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            } else {
                if (!array_key_exists($indexKey, $value)) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if (!is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }

    public function show_all_mcp()
    {
        $sql="SELECT * from tbl_user_mcp";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_mcp_by_mcp_id($mcp_id)
    {
        $sql="SELECT * from tbl_user_mcp WHERE mcp_id='$mcp_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_mcp($data)
    {
        $data1 = array(
            'bn_mcp_name' =>  $data['bn_mcp_name'],
            'en_mcp_name' =>  $data['en_mcp_name'],
            'image' => $data['mcp_image'],
            'status' => '1'
        );
        $this->db->insert('tbl_user_mcp', $data1);
        return 1;
    }
    public function update_mcp($data)
    {
        $data1 = array(
            'mcp_name' =>  $data['mcp_name'],
            'shop_name' =>  $data['shop_name'],
            'shop_address' => $data['shop_address'],
            'product' =>  $data['product'],
            'phone_number' => $data['phone_number'],
            'photo' => $data['mcp_image'],
            'shop_photo' => $data['shop_image'],
            'status' => '1'
        );
        $data2 = array(
            'name' =>  $data['mcp_name'],
            'phone_number' => $data['phone_number']
        );
        $this->db->where('mcp_id', $data['mcp_id']);
        $this->db->update('tbl_user_mcp', $data1);
        $this->db->where('user_id', $data['mcp_id']);
        $this->db->update('tbl_login', $data2);
        return 1;
    }

    public function block_mcp($mcp_id)
    {
        $sql="UPDATE tbl_user_mcp SET status='0' WHERE mcp_id='$mcp_id'";
        $this->db->query($sql);
        $sql1="UPDATE tbl_login SET status='0' WHERE user_id='$mcp_id'";
        $this->db->query($sql1);
    }
    public function active_mcp($mcp_id)
    {
        $sql="UPDATE tbl_user_mcp SET status='1' WHERE mcp_id='$mcp_id'";
        $this->db->query($sql);
        $sql1="UPDATE tbl_login SET status='1' WHERE user_id='$mcp_id'";
        $this->db->query($sql1);
    }
    public function delete_mcp($mcp_id)
    {
        $sql="SELECT * from tbl_user_mcp WHERE mcp_id='$mcp_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['image']);
        $this->db->delete('tbl_user_mcp', array('mcp_id' => $mcp_id));
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