<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Customer extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('customer_model','tbl_customer');
    }

    public function index_options(){
        die();
    }

    public function index_post()
    {
        $data = $this->post();
        $myID = $this->post("building_permit_number");
        $check = $this->tbl_customer->checkdata($myID);

        if ($check) {
            $data = $this->tbl_customer->checkdata($myID);
            
            $this->response($data, 200);
        } else
        {
            $id = $this->tbl_customer->insert($data);
                
            $this->response(array('building_permit_number' => $id), 200); 
        }

             
    }

    public function index_get()
    {       
        $data = $this->tbl_customer->get_all();
        $this->response($data, 200);
        
    }


    public function index_put()
    {
        $data = $this->put();
        $this->tbl_customer->update($data);
        $this->response($this->index_get(), 200);
    }

}