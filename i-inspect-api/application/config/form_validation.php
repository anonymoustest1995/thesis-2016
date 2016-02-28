<?php

$config = array(
    'users' => array(
	    array('field' => "user_username", 'label'  => "Username", 'rules' => "required|trim|min_length[4]|max_length[15]|callback_check_if_username_exists"),
	    array('field' => "user_email", 'label'  => "Email", 'rules' => "required|trim|valid_email|callback_check_if_email_exists"),
	    array('field' => "user_lastname", 'label'  => "Lastname", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
	    array('field' => "user_firstname", 'label'  => "Firstname", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
       	array('field' => "user_middlename", 'label'  => "Middlename", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
       	array('field' => "user_password", 'label'  => "Password", 'rules'  => "required|trim|min_length[5]|max_length[25]"),
       	array('field' => "user_confirm_password", 'label'  => "Confirm Password", 'rules'  => "required|trim|matches[user_password]"),
    ),

    'user-update' => array(
		array('field' => "user_email", 'label'  => "Email", 'rules' => "required|valid_email"),
		array('field' => "user_lastname", 'label'  => "Lastname", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
	    array('field' => "user_firstname", 'label'  => "Firstname", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
       	array('field' => "user_middlename", 'label'  => "Middlename", 'rules'  => "required|trim|alpha|min_length[2]|max_length[25]"),
		array('field' => "user_password", 'label'  => "Password", 'rules'  => "required|trim|min_length[5]|max_length[25]"),
       	array('field' => "user_confirm_password", 'label'  => "Confirm Password", 'rules'  => "required|trim|matches[user_password]"),
    ),

    'positions' => array(
      array('field' => "position_description", 'label'  => "Description", 'rules' => "required"),
    ),

    'inspection_type' => array(
      array('field' => "inspection_type_description", 'label'  => "Description", 'rules' => "required"),
    ),

    

);