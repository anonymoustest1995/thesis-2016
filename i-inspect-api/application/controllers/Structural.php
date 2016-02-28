<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Structural extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('structural_model');
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
                    'structural_inspection_id'  =>  $xid,
                    'footing_size'              => $this->post('footing_size', TRUE),
                    'column_size'               => $this->post('column_size', TRUE),
                    'main_rebars_size'          => $this->post('main_rebars_size', TRUE),
                    'front_seatback'            => $this->post('front_seatback', TRUE),
                    'left_side_seatback'        => $this->post('left_side_seatback', TRUE),
                    'right_side_seatback'       => $this->post('right_side_seatback', TRUE),
                    'rear_seatback'             => $this->post('rear_seatback', TRUE),
                );
            $this->load->model('structural_model','tbl_structural');
            $id = $this->tbl_structural->insert_structural($xdata);

            $this->response(array('inspection_id' => $id ), 200);   
        }      
    }

}