<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Users_api extends REST_Controller {

    function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->library('Hasher');
        $this->load->model('users_api_model');
    }

    public function index_options(){
        die();
    }
    
    public function index_get()
    {   
        
        $this->load->model('Users_api_model','tbl_users');
        $data = $this->tbl_users->get_all();
        $this->response($data, 200);
        
    }

    public function login_post() 
    {   
        $username = $this->post('user_username');
        $password = $this->post('user_password');
        $userData = $this->users_api_model->getUsersCredential($username);
        if($this->hasher->authLogin($username,$password))
            {
        $data = array("userData" => $userData, "status"=>true);
        $this->response($data);
            };
    }  

    public function logout_post() 
    {   
        // Clear session array
       $data = array(   'user_id'       => '',
                        'user_username' => '',
                        'user_firstname'=> '',
                        'user_lastname' => '',
                        'user_email'    => '',
                        'is_logged_in'  => '',
                    );

       // Remove session data
       $this->session->unset_userdata($data);

       // Destroy session
       $this->session->sess_destroy();

       $x = array("message"=>"Logout Successfully");

        $this->response($x);


    }   

    public function index_delete()
    {

        
    }

    public function index_put()
    {

    }
    

}
?>