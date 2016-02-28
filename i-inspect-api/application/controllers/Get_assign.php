<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Get_assign extends REST_Controller
{

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        //Load Model
        $this->load->model('assign_model');
    }

    public function index_options()
    {
        die();
    }

    //Get data with ID
     function index_get($id='')
    {    
        if(!$id) $id = $this->get('user_id');
        if(!$id)
        {
            $widgets = $this->assign_model->get_all();                        
            if($widgets)
                $this->response($widgets, 200); // 200 being the HTTP response code
            else
                $this->response(array('error' => 'Couldn\'t find any data!'), 404);
        }

        $widget = $this->assign_model->get_id($id);

        if($widget)
            $this->response($widget, 200); // 200 being the HTTP response code
        else
            $this->response(array('error' => 'Data could not be found'), 404);
    }
}
?>