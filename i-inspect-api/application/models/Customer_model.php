<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

     public function insert($data){
        $this->db->insert('tbl_customer', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }


    public function update($data){
        $query = $this->db->where('building_permit_number', $data['building_permit_number']);
        
        $this->db->update('tbl_customer', $data);
    }

    public function get_all(){
        return $this->db->get('tbl_customer')->result_object();
    }
    
    public function checkdata($myID) {
        $query = $this->db->limit(1)
                          ->where('building_permit_number', $myID)
                          ->get('tbl_customer');
        
        return $query->row();
    }

}