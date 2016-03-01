<?php

class Get_area_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_electronics_area ()
    {
        $query = $this->db->select('*')
                          ->from('tbl_inspection_area')
                          ->join('tbl_inspection_type','tbl_inspection_area.inspection_type_id_link = tbl_inspection_type.inspection_type_id','join')
                          ->where('inspection_type_description','Electronics')
                          ->get();

        return $query->result();
    }

    public function get_mechanical_area ()
    {
        $query = $this->db->select('*')
                          ->from('tbl_inspection_area')
                          ->join('tbl_inspection_type','tbl_inspection_area.inspection_type_id_link = tbl_inspection_type.inspection_type_id','join')
                          ->where('inspection_type_description','Mechanical')
                          ->get();

        return $query->result();
    }


}
