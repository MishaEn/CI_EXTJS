<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Migration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->input->is_cli_request()
        or exit("Execute via command line: php index.php migrate");

        $this->load->library('migration');
    }

    public function index()
    {
        $this->load->library('migration');
        if(!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            echo 'migrate success';
        }


    }

}