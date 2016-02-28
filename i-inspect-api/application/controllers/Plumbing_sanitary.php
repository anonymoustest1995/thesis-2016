<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Plumbing_sanitary extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('plumbing_sanitary_model');
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
                    'plumbing_inspection_id'    =>  $xid,
                    'fixtures_to_be_installed' => $this->post('fixtures_to_be_installed', TRUE),
                    'status' => $this->post('status', TRUE),
                    'quantity' => $this->post('quantity', TRUE),
                    'water_supply' => $this->post('water_supply', TRUE),
                    'system_of_disposal' => $this->post('system_of_disposal', TRUE),
                    'number_of_stories' => $this->post('number_of_stories', TRUE),
                    'date_installed' => $this->post('date_installed', TRUE),
                    'date_completion' => $this->post('date_completion', TRUE),
                    'total_area' => $this->post('total_area', TRUE),
                );
            $this->load->model('plumbing_sanitary_model','tbl_plumbing_or_sanitary');
            $id = $this->tbl_plumbing_or_sanitary->insert_plumbing_or_sanitary($xdata);

            $this->response(array('inspection_id' => $id ), 200);   
        }      
    }
}