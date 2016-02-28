<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Others_model extends CI_Model {

    public function insert_others($xdata){
        $this->db->insert('tbl_others', $xdata);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    

}