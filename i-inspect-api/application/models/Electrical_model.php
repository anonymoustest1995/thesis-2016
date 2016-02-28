<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Electrical_model extends CI_Model {

    public function insert_electrical($xdata){
        $this->db->insert('tbl_electrical', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    

}