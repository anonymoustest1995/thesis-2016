<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Architectural_model extends CI_Model {

    public function insert_architectural($xdata){
        $this->db->insert('tbl_architectural', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    

}