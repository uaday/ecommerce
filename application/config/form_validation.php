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
);
