<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Get_data_model extends CI_Model
{

	//Get Data from BPMS DB
	public function get_all(){
        return $this->db->get('tbl_customer')->result_object();
    }

    public function get_id($id){
        $query = $this->db->limit(1)
                          ->where('building_permit_number', $id)
                          ->get('tbl_customer');
        
        return $query->row();
    }
    
    

}