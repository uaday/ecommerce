<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Learner_model extends CI_Model
{


    public function total_drug()
    {
        $sql = "SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

   
    public function upload_learner_file()
    {
        $check_array = array();
        $duplicate = array();
        $allowed = array('csv');
        $filename = $_FILES['learner_bulk']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $this->session->set_userdata('error', 'Wrong File Format');
            redirect(base_url().'portal/learner');
        } else {
            $sql = "SELECT learner_id FROM tbl_user_learner";
            $result = $this->db->query($sql);
            $k = 0;
            $fp = fopen($_FILES['learner_bulk']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                ini_set('max_execution_time', 3000);
                if (count($csv_line) == 8) {
                    $insert_csv = array();

                    $insert_csv['learner_id'] = $this->db->escape_str($csv_line['0']);
                    $insert_csv['learner_name'] = $this->db->escape_str($csv_line['1']);
                    $insert_csv['mobile_number'] = $this->db->escape_str($csv_line['2']);
                    $insert_csv['father_name'] = $this->db->escape_str($csv_line['3']);
                    $insert_csv['gender'] = $this->db->escape_str($csv_line['4']);
                    $insert_csv['photo'] = $this->db->escape_str($csv_line['5']);
                    $insert_csv['present_address'] = $this->db->escape_str($csv_line['6']);
                    $insert_csv['mcp_id'] =$this->db->escape_str($csv_line['7']);
                    if ($k != 0) {
                        $d_check = array_search($insert_csv['learner_id'], $check_array);
                        if ($d_check > -1) {
                            array_push($duplicate, $insert_csv['learner_id']);
                        } else {
                            array_push($check_array, $insert_csv['learner_id']);
                            $val = substr($insert_csv['mobile_number'], 0, 1);
                            if ($val != 0) {
                                $insert_csv['mobile_number'] = '0' . $insert_csv['mobile_number'];
                            }
                            $key = array_search($insert_csv['learner_id'], $this->array_column($result->result_array(), 'learner_id'));
                            if ($key > -1) {
                                $sql1 = "UPDATE tbl_user_learner SET learner_id='$insert_csv[learner_id]',learner_name='$insert_csv[learner_name]',mobile_number='$insert_csv[mobile_number]',father_name='$insert_csv[father_name]',gender='$insert_csv[gender]',photo='$insert_csv[photo]',present_address='$insert_csv[present_address]',mcp_id='$insert_csv[mcp_id]' WHERE learner_id='$insert_csv[learner_id]'";
                                $this->db->query($sql1);
                            } else {

                                $sql2 = "INSERT INTO tbl_user_learner(learner_id,learner_name,mobile_number,father_name,gender,photo,present_address,mcp_id,status) VALUES ('$insert_csv[learner_id]','$insert_csv[learner_name]','$insert_csv[mobile_number]','$insert_csv[father_name]','$insert_csv[gender]','$insert_csv[photo]','$insert_csv[present_address]','$insert_csv[mcp_id]','1')";
                                $this->db->query($sql2);
                            }
                        }
                    }
                    $k++;
                } else {
                    $this->session->set_userdata('error', 'Wrong File Format');
                    redirect(base_url().'portal/learner');
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

    public function show_all_learner()
    {
        $sql="SELECT * from tbl_user_learner";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function select_learner_by_learner_id($learner_id)
    {
        $sql="SELECT * from tbl_user_learner WHERE learner_id='$learner_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_new_learner($data)
    {
        $data1 = array(
            'bn_learner_name' =>  $data['bn_learner_name'],
            'en_learner_name' =>  $data['en_learner_name'],
            'image' => $data['learner_image'],
            'status' => '1'
        );
        $this->db->insert('tbl_user_learner', $data1);
        return 1;
    }
    public function update_learner($data)
    {
        $data1 = array(
            'learner_name' =>  $data['learner_name'],
            'mobile_number' =>  $data['mobile_number'],
            'father_name' =>  $data['father_name'],
            'gender' =>  $data['gender'],
            'photo' =>  $data['photo'],
            'present_address' => $data['present_address'],
            'mcp_id' => $data['mcp_id'],
            'status' => '1'
        );
        $this->db->where('learner_id', $data['learner_id']);
        $this->db->update('tbl_user_learner', $data1);
        return 1;
    }

    public function block_learner($learner_id)
    {
        $sql="UPDATE tbl_user_learner SET status='0' WHERE learner_id='$learner_id'";
        $this->db->query($sql);
    }
    public function active_learner($learner_id)
    {
        $sql="UPDATE tbl_user_learner SET status='1' WHERE learner_id='$learner_id'";
        $this->db->query($sql);
    }
    public function delete_learner($learner_id)
    {
        $sql="SELECT * from tbl_user_learner WHERE learner_id='$learner_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        $row=$result->result_array();
        unlink($row['0']['image']);
        $this->db->delete('tbl_user_learner', array('learner_id' => $learner_id));
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