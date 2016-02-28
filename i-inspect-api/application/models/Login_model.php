<?php

class Login_model extends CI_Model {
	
	
	public function __construct() {

	}


	function login_user_account($username, $password){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', sha1($password . HASH_KEY));
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();	
	}


} 

?>