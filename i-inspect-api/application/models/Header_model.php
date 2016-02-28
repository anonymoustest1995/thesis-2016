<?php

class Header_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save_header_data ($data)
    {
      $this->db->insert('tbl_header', $data);
      return $this->db->affected_rows();
    }
}
