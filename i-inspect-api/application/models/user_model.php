<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
   function get_users_one($id){

   		$this->db->where('user_id', $id);
   		$result = $this->db->get('tbl_users');
   		return $result->row();
   }

      function get_random_user(){

   		$this->db->order_by('user_id', 'RANDOM');
   		$this->db->limit(1);
   		$result = $this->db->get('tbl_users');
   		return $result->row();
   }

}
