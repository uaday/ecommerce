<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_file extends CI_Controller {


    public function learner_format()
    {
        header('Content-disposition: attachment; filename=learner_bulk_format.csv');
        header('Content-type: csv');
        readfile('./upload/csv/learner_bulk_format.csv');
    }
    public function mcp_format()
    {
        header('Content-disposition: attachment; filename=mcp_bulk_format.csv');
        header('Content-type: csv');
        readfile('./upload/csv/mcp_bulk_format.csv');
    }
    public function user_format()
    {
        header('Content-disposition: attachment; filename=user_bulk_format.csv');
        header('Content-type: csv');
        readfile('./upload/csv/user_bulk_format.csv');
    }



}