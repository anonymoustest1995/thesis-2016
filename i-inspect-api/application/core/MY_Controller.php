<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_logged_in') && !in_array(uri_string(), array('login'))) {
            redirect(base_url('login'));
        }
        elseif ($this->session->userdata('user_position')!="Administrator" && $this->uri->segment(1) == "admin") 
        {
       		redirect(base_url('admin/dashboard'));
	    }
    }
}