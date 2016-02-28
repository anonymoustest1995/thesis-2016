<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Auth
{
    public function validateLogin ($username, $password)
    {
        // Get the codeigniters instance
        $CI = & get_instance();

        $CI->load->library('encrypt');
        $CI->load->model('user_model');

        $user = $CI->user_model->getUsersCredential($username);

        // If user provided password is equal to the hash password then
        // register the user credentials to the session. Otherwise return FALSE
        if ($password === $CI->encrypt->decode($user->user_password)) {
            $CI->session->set_userdata(
                array(
                    'user_id' => $user->user_id,
                    'user_username' => $user->user_username,
                    'is_logged_in' => TRUE,
                )
            );

            return TRUE;
        } else {
            return FALSE;
        }
    }
}