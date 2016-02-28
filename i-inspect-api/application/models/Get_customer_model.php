<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Get_customer_model extends CI_Model
{

	//Get Data from BPMS DB
	public function get_all(){
        $query  = $this->db->select('*')
                         ->from('tbl_assigned')
                         ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                         ->order_by('assigned_id')
                         ->get();

      return $query->result();
    }

    public function get_id($id){
        $query  = $this->db->select('*')
                   ->from('tbl_assigned')
                   ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                   ->where('assigned_id', $id)
                   ->limit(1)
                   ->get();

        
        return $query->row();
    }
    
    

}