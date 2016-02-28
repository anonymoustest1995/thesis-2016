<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * Insert Data to Database
    */
    public function save_position_data ($data)
    {
        $query = $this->db->insert('tbl_positions', $data);
        return  $query;        
    }

    public function get_positions () {

       $query  = $this->db->select('*')
                         ->from('tbl_positions')
                         ->get();

      return $query->result();
    }

    public function  save_approved_data ($data)
    {
      $query = $this->db->insert('tbl_occupancy', $data);
      $insert_id = $this->db->insert_id();
        return  $insert_id;     
    }
   

    public function save_inspection_type_data ($data)
    {
       $query = $this->db->insert('tbl_inspection_type', $data);
        return  $query;
    }

    public function save_assign_customer_data ($data)
    {
        // $query = $this->db->insert('tbl_customer', $data);
        // $insert_id = $this->db->insert_id();
        // return  $query;

        //$this->db->trans_start();
        $this->db->insert('tbl_customer', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        //$this->db->trans_complete();
    }

    public function save_assign_data ($data)
    {
        //$this->db->trans_start();
        $this->db->insert('tbl_assigned', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
       // $this->db->trans_complete();
    }
    
    public function customer_data ($id)
    {
      $dbpmsdb = $this->load->database('dbpmsdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $query = $dbpmsdb->select('*')
                          ->from('building_permit_view')
                          ->where('building_permit_number', $id)
                          ->get();

        return $query->result();
    }

    public function customer_approved_data() {
              $query  = $this->db->select('*')
                         ->from('tbl_occupancy')
                         ->join('tbl_customer', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->group_by('building_permit_number')
                         ->get();

      return $query->result();
    }

    public function assigned_data() {
              $query  = $this->db->select('*')
                         ->from('tbl_assigned')
                         ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                         ->where('purpose', 'Occupancy')
                         ->get();

      return $query->result();
    }

    public function assign_delete($id) {
        $this->db->where('assigned_id', $id);
        $this->db->delete('tbl_assigned');
    }
    public function users_data() {
        $query = $this->db->select('*')
                          ->from('tbl_users')
                          ->where('user_position_link !=', 'Administrator' )
                          ->get();

        return $query->result();
    }

    public function checkdata($myID) {
        $query = $this->db->limit(1)
                          ->where('building_permit_number', $myID)
                          ->get('tbl_customer');
        
        return $query->row();
    }

    public function check_occupancy($myID) {
       $query = $this->db->limit(1)
                          ->where('building_permit_number_link', $myID)
                          ->get('tbl_occupancy');
        
        return $query->row();
    }



  
}
