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
         $this->load->model('users_model');
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

    public function change_password_post()
    {
        $id = $this->post('user_id');

        $checkuser = $this->users_model->checkid($id);

        $pass = $this->post('user_password', TRUE);
        $pwd = $this->hasher->createHash($pass);
        $hashed_password = $pwd;
        
        $data = array(
                    'user_id' => $this->post('user_id'),
                    'user_username'     => $this->post('user_username', TRUE),
                    'user_email'        => $this->post('user_email', TRUE),
                   'user_position_link' => $this->post('user_position_link', TRUE),
                    'user_lastname'     => ucfirst($this->post('user_lastname', TRUE)),
                    'user_firstname'    => ucfirst($this->post('user_firstname', TRUE)),
                    'user_middlename'   => ucfirst($this->post('user_middlename', TRUE)),
                    'user_gender'       => $this->post('user_gender', TRUE),
                    'user_password'     => $hashed_password,
        );
        
        $this->db->where('user_id', $id);
        $this->db->update('tbl_users', $data);

        $x = array("data" => $data);
        $this->response($x);
        
    }

    public function index_put()
    {

    }
    

}
?>