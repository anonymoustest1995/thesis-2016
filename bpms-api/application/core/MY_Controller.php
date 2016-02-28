<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_logged_in') && !in_array(uri_string(), array('login'))) {
            redirect(base_url('login'));
        }
    }
}