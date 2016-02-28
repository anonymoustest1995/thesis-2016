<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Get_data_model extends CI_Model
{

	//Get Data from BPMS DB
	public function get_all(){
        return $this->db->get('building_permit_view')->result_object();
    }

    public function get_id($id){
        $query = $this->db->limit(1)
                          ->where('building_permit_number', $id)
                          ->get('building_permit_view');
        
        return $query->row();
    }
    
    

}