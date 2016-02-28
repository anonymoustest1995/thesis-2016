<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Electrical extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('electrical_model');
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
                    'electrical_inspection_id'      =>  $xid,
                    'number_of_light_outlet'        => $this->post('number_of_light_outlet', TRUE),
                    'number_of_convenience_outlet'  => $this->post('number_of_convenience_outlet', TRUE),
                    'number_of_aircon_outlet'       => $this->post('number_of_aircon_outlet', TRUE),
                    'number_of_cooking_unit_outlet' => $this->post('number_of_cooking_unit_outlet', TRUE),
                    'number_of_water_heater_outlet' => $this->post('number_of_water_heater_outlet', TRUE),
                    'number_of_water_pump_outlet'   => $this->post('number_of_water_pump_outlet', TRUE),
                    'number_of_toggle_switch'       => $this->post('number_of_toggle_switch', TRUE),
                    'number_of_bells_or_buzzers'    => $this->post('number_of_bells_or_buzzers', TRUE),
                    'number_of_push_buttons'        => $this->post('number_of_push_buttons', TRUE),
                    'number_of_fa_detectors'        => $this->post('number_of_fa_detectors', TRUE),
                );
            $this->load->model('electrical_model','tbl_electrical');
            $id = $this->tbl_electrical->insert_electrical($xdata);

            $this->response(array('inspection_id' => $id ), 200);   
        }      
    }
}