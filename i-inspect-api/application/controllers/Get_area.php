<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Get_area extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('get_area_model','tbl_inspection_area');
    }

    public function index_options(){
        die();
    }

    public function electronics_area_get()
    {       
        $data = $this->tbl_inspection_area->get_electronics_area();
        $this->response($data, 200);
        
    }

    public function mechanical_area_get()
    {       
        $data = $this->tbl_inspection_area->get_mechanical_area();
        $this->response($data, 200);
        
    }

}