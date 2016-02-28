<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_api_model extends CI_Model {
    
    public function get_all(){
        return $this->db->get('tbl_users')->result_object();
    }

    public function insert($data){
        $this->db->insert('tbl_users', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function delete($id){
        return $this->db->delete('tbl_headers',array('header_id' => $id));
    }

    
    public function update($data){
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_users', $data);
    }
    
    
    function getUsersCredential($username){
      $query = $this->db->select('*')
                        ->from('tbl_users')
                        ->where('user_username', $username)
                        ->get();
      
      return $query->row();
    }
}