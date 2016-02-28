<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Structural_model extends CI_Model {

    public function insert_structural($xdata){
        $this->db->insert('tbl_structural', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

}