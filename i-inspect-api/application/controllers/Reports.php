<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Library Form Validation
        $this->load->library('form_validation');
        // Load Models
        $this->load->model('reports_model');
    }

    /*
    * Show Reports Page
    */
    public function architectural ()
    {
       // $data = $this->users_model->count_users();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Reports',
            //    'count'=> $data,
            )
        );
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/footer');
    }





}
