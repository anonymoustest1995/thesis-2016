<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mechanical_model extends CI_Model {

    public function insert_mechanical($xdata){
        $this->db->insert('tbl_mechanical', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    

}