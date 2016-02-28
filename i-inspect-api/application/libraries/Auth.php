<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

// Turn off all error reporting
// error_reporting(0);

class Auth
{
    public function validateLogin ($username, $password)
    {
        // Get the codeigniters instance
        $CI = & get_instance();

        // $CI->load->library('encrypt');
        $CI->load->model('users_model');

        $user = $CI->users_model->get_users_credential($username);


        // If user provided password is equal to the hash password then
        // register the user credentials to the session. Otherwise return FALSE
        if ($password === crypt($user->user_password)) {
            $CI->session->set_userdata(
                array(
                    'user_id'       => $user->user_id,
                    'user_username' => $user->user_username,
                    'user_lastname' => $user->user_lastname,
                    'user_firstname'=> $user->user_firstname,
                    'is_logged_in'  => TRUE,
                )
            );
            return TRUE;
        } else {
            return FALSE;
        }
    }

}