<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Plumbing_sanitary_model extends CI_Model {

    public function insert_plumbing_or_sanitary($xdata){
        $this->db->insert('tbl_plumbing_or_sanitary', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    

}