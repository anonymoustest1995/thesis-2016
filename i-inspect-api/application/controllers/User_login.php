<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class User_login extends REST_Controller {

    public function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === "OPTIONS") {
            die();
        }
        
        parent::__construct();
        
        $this->load->model('login_model');

    }


    public function login_account_post() 
    {   
        $username = $this->post( "user_username" );
        $password = $this->post("user_password");
        
        $reply = $this->login_model->login_user_account($username, $password);
        if($reply)
            {
                $this->session->set_userdata( array(
                                        'user_id' => $query[0]->user_id,
                                        'user_username' => $query[0]->user_username,
                                        'user_firstname' => $query[0]->user_firstname,
                                        'user_middlename' => $query[0]->user_middlename,
                                        'user_lastname' => $query[0]->user_lastname,
                                        'is_logged_in' => true,
                                        ));
                $this->response($reply, 200);
            }   
    }   





}
