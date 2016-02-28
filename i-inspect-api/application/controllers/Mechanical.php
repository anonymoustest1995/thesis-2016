<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Mechanical extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('mechanical_model');
        $this->load->model('electronics_model');
    }

    public function index_options(){
        die();
    }

    public function index_post()
    {
        $myID = $this->post('assigned_id_link', TRUE);
        $check = $this->electronics_model->checkdata($myID);
        if ($check) {
            $this->response('Already Inspected', 200);   
        } else {
                $data = array(
                    'inspection_id'   => $this->post('inspection_id', TRUE),
                    'assigned_id_link'=> $this->post('assigned_id_link', TRUE),
                    'inspection_type' => $this->post('inspection_type', TRUE),
                    'scope_of_work'   => $this->post('scope_of_work', TRUE),
                    'remarks'         => $this->post('remarks', TRUE),
                    'feedbacks'       => $this->post('feedbacks', TRUE),
                    'payment'         => $this->post('payment', TRUE),
                    'others'          => $this->post('others', TRUE),
                );
            $this->load->model('electronics_model','tbl_inspection');
            $xid = $this->tbl_inspection->insert($data);

            $xdata = array(
                    'mechanical_inspection_id'    =>  $xid,
                    'mechanical_installation_operation_description' => $this->post('mechanical_installation_operation_description', TRUE),
                );
            $this->load->model('mechanical_model','tbl_mechanical');
            $id = $this->tbl_mechanical->insert_mechanical($xdata);

            $this->response(array('inspection_id' => $id ), 200);   
        }      
    }
}