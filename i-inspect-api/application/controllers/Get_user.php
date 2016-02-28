<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Get_user extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('users_model','tbl_users');
    }

    public function index_options(){
        die();
    }


    public function index_get()
    {       
        $data = $this->tbl_users->get_all();
        $this->response($data, 200);
    }    

    public function architectural_get()
    {       
        $data = $this->tbl_users->get_architectural_users();
        $this->response($data, 200);
    }

    public function inspection_type_get()
    {       
        $data = $this->tbl_users->get_all_inspection_type();
        $this->response($data, 200);
    }


}