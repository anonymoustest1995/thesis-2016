<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Electronics_model extends CI_Model {

     public function insert($data){
        $this->db->insert('tbl_inspection', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function insert_electronics($xdata){
        $this->db->insert('tbl_electronics', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function checkdata($myID) {
        $query = $this->db->limit(1)
                          ->where('assigned_id_link', $myID)
                          ->get('tbl_inspection');
        
        return $query->row();
    }


    
    

}