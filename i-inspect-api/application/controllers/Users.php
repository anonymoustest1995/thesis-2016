<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        /**Load Libraries*/
        $this->load->library('form_validation');
        $this->load->library('Hasher');

        /**Load Models*/
        $this->load->model('users_model');
        $this->load->model('admin_model');
        $this->load->model('header_model');
        
    }

    public function index(){
        
    }

    /*
    * Save User Info
    */
    public function save_user_info ()
    {
        $pass = $this->input->post('user_password', TRUE);
      /*  $pwd  = sha1($pass . HASH_KEY);*/
        $pwd = $this->hasher->createHash($pass);
        $hashed_password = $pwd;

        $this->form_validation->set_message('matches', "Passwords don't match! Please Enter Again." );
       // Remove form validation error message delimeter
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run('users') === FALSE) {
                echo json_encode(
                    array(
                        'notification' => 'Validation error',
                        'error'        => array(
                            'user_id'               => form_error('user_id'),
                            'user_username'         => form_error('user_username'),
                            'user_email'            => form_error('user_email'),
                            'user_lastname'         => form_error('user_lastname'),
                            'user_firstname'        => form_error('user_firstname'),
                            'user_middlename'       => form_error('user_middlename'),
                            'user_password'         => form_error('user_password'),
                            'user_confirm_password' => form_error('user_confirm_password'),
                        )
                    )
                );
            } else {

                $confirm = $this->users_model->save_user_data(
                    array(
                        'user_id'               => $this->input->post('user_id', TRUE),
                        'user_username'         => $this->input->post('user_username', TRUE),
                        'user_email'            => $this->input->post('user_email', TRUE), 
                        'user_lastname'         => ucfirst($this->input->post('user_lastname', TRUE)),
                        'user_firstname'        => ucfirst($this->input->post('user_firstname', TRUE)),
                        'user_middlename'       => ucfirst($this->input->post('user_middlename', TRUE)),
                        'user_gender'           => $this->input->post('user_gender', TRUE),
                        'user_password'         => $hashed_password,
                        'user_position_link'    => $this->input->post('user_position', TRUE),
                        )
                );

                echo ($confirm) ? json_encode(array('notification' => 'Record Successfully Saved')) : json_encode(array('notification' => 'Failed Creation'));
            }

       
    }  

    /*
    * Display's the Lists of Users
    */
    public function users_list ()
    {         
        $id             = $this->uri->segment(3);
        $xid            = $this->input->post('user_id', TRUE);
        $xdata          = $this->users_model->update($id);
        $count          = $this->users_model->count_users();
        $data           = $this->users_model->get_record();
        $userposition   = $this->users_model->get_user_position();
        $this->load->view('layouts/header',
            array(
                'title' => 'User Lists',
                'data' => $data,
                'userposition' => $userposition,
                'count'=> $count,
                'record' => $xdata,
            )
        );
        $this->load->view('user/users-lists.php');
        $this->load->view('layouts/footer');
    }


    /**
     * Deleting User Record
     */
    public function delete_user()
    {
        $id = $this->uri->segment(3);
        $this->users_model->delete($id);
        if ($id  > 0) 
            {
               echo json_encode('Record Successfully Deleted');
                redirect('admin/users-lists');
            }
            else 
            {   
                echo "<script language='javascript' type='text/javascript'>alert('Record Deletion Failed!')</script>";
            }
    }


    /**
     * Show User Update Form
     */
    public function update_user_info()
    {
        $id   = $this->uri->segment(3);
        $records = $this->users_model->update($id);
        $pos = $this->users_model->get_user_position();


        $this->load->view('user/update-user-form',  array(
                        'title'  => 'Update User information',
                        'records'=> $records,
                        'userposition' => $pos,
                    ));
        $this->load->view('layouts/update-footer');

    }

    /*
    * Save Updated User Information
    */
    public function save_user_update(){
        $pass = $this->input->post('user_password', TRUE);
      /*  $pwd  = sha1($pass . HASH_KEY);*/
        $pwd = $this->hasher->createHash($pass);
        $hashed_password = $pwd;

        $this->form_validation->set_message('matches', "Passwords don't match! Please Enter Again." );
       // Remove form validation error message delimeter
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run('user-update') === FALSE) {
                echo json_encode(
                    array(
                        'notification' => 'Validation error',
                        'error'        => array(
                            'user_password'         => form_error('user_password'),
                            'user_confirm_password' => form_error('user_confirm_password'),
                        )
                    )
                );
            } else {

            $id   = $this->uri->segment(3);
            $data = $this->users_model->save_update_user_data($id, 
                array(
                    'user_username'     => $this->input->post('user_username', TRUE),
                    'user_email'        => $this->input->post('user_email', TRUE),
                    'user_position_link' => $this->input->post('user_position_link', TRUE),
                    'user_lastname'     => ucfirst($this->input->post('user_lastname', TRUE)),
                    'user_firstname'    => ucfirst($this->input->post('user_firstname', TRUE)),
                    'user_middlename'   => ucfirst($this->input->post('user_middlename', TRUE)),
                    'user_gender'       => $this->input->post('user_gender', TRUE),
                    'user_password'     => $hashed_password,
                    )
        );

        $this->db->where('user_id', $id);
        $this->db->update('tbl_users', $data);

        echo ($confirm) ? json_encode(array('notification' => 'Record Successfully Updated')) : json_encode(array('notification' => 'Failed Creation'));
        }
    }


    /**
     * Login Method
     */
    public function login ()
    {
        if ($_POST) 
        {
            $username = $this->input->post('user_username', TRUE);
            $password = $this->input->post('user_password', TRUE);
            $confirm = $this->hasher->authLogin($username, $password);
            if ($confirm) 
            {
                if($this->session->userdata('user_position') != 'Super Admin' && $this->session->userdata('user_position') != 'Administrator') 
                {
                    $this->load->view('layouts/login-header');
                        $this->load->view('auth/login',
                            array(
                                'title' => 'Login Failed',
                                'err' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Access Not Allowed ! You are not the Administrator.  </strong> </div>',
                                )
                            );
                        $this->load->view('layouts/login-footer');
                }else {
                    redirect('admin/dashboard');
                }
            }
            else {
                $this->load->view('layouts/login-header'
                );
                $this->load->view('auth/login',
                    array(
                        'title' => 'Login Failed',
                        'err' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry, Invalid Username or Password !</strong> </div>',
                        )
                    );
                $this->load->view('layouts/login-footer');
            }
        }
        else {
             //Show the login page
            $this->load->view('layouts/login-header',
                array(
                    'title' => 'Login',
                    'err' => '',
                )
            );
            $this->load->view('auth/login');
            $this->load->view('layouts/login-footer');
        }
    }

    public function logout ()
    {
       // Clear session array
       $sessData = array('user_id'      => '',
                        'user_username' => '',
                        'user_username' => '',
                        'user_firstname'=> '',
                        'user_lastname' => '',
                        'user_email'    => '',
                        'user_type'     => '',
                        'is_logged_in'  => '',);

       $sessData = array();

       // Remove session data
       $this->session->unset_userdata($sessData);

       // Destroy session
       $this->session->sess_destroy();

       // Redirect to the login page.
       redirect('login');
    }

    /*
    *Username Already Exists Callback Function
    */
    public function check_if_username_exists ($requested_username)
    {
        $username_available = $this->users_model->check_if_username_exists($requested_username);
        
        if ($username_available) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_if_username_exists', 'Sorry, that username already exists.');
            return FALSE;
        }

    }

    /*
    *Email Already Exists Callback Function
    */
    public function check_if_email_exists ($requested_email)
    {
        $email_available = $this->users_model->check_if_email_exists($requested_email);
        
        if ($email_available) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_if_email_exists', 'Sorry, that email already exists.');
            return FALSE;
        }

    }


}
