<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
    'userlogin_check' => array (
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'password',
            'label' => 'User password',
            'rules' => 'trim|required'
        )
    ),
    'product_design' => array (
        array(
            'field' => 'product_design_name',
            'label' => 'Product Design Name',
            'rules'=>'trim|required|is_unique[tbl_product_design.product_design_name]'
        )
    ),
    'product_condition' => array (
        array(
            'field' => 'product_condition_name',
            'label' => 'Product Condition Name',
            'rules'=>'trim|required|is_unique[tbl_product_condition.product_condition_name]'
        )
    ),
    'product_grade' => array (
        array(
            'field' => 'product_grade_name',
            'label' => 'Product Grade Name',
            'rules'=>'trim|required|is_unique[tbl_product_grade.product_grade_name]'
        )
    ),
    'admin_user' => array (
        array(
            'field' => 'user_id',
            'label' => 'User Id',
            'rules'=>'trim|required'
        ),
        array(
            'field' => 'phone_number',
            'label' => 'Phone Number',
            'rules'=>'trim|required|is_unique[tbl_login.phone_number]'
        )
    )
);
