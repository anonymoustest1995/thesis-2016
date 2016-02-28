
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_model extends CI_Model
{
    
    public function get_bpms()
    {
      $dbpmsdb = $this->load->database('dbpmsdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

      $query = $dbpmsdb->select('*')
                        ->from('building_permit_view')
                        ->get();

        return $query->result();
    }

    public function get_all(){
        $query  = $this->db->select('*')
                         ->from('tbl_assigned')
                         ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                         ->where('purpose', 'Occupancy')
                         ->order_by('assigned_id')
                         ->get();

      return $query->result();
    }

     public function get_id($id){
        $query  = $this->db->select('*')
                   ->from('tbl_assigned')
                   ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                   ->where('user_id', $id)
                   ->where('purpose', 'Occupancy')
                   ->get();

        
        return $query->result();
    }
    

    public function get_occupancy_data(){

        $query  = $this->db->select('*')
                   ->from('tbl_occupancy')
                   ->join('tbl_customer', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->get();
        
        return $query->result();
    }
    
    public function get_customer_occupancy($id){

        $query  = $this->db->select('*')
                   ->from('tbl_assigned')
                   ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->join('tbl_occupancy', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->where('occupancy_number', $id)
                   ->group_by('occupancy_number')
                   ->get();
        
        return $query->result();
    }

    public function get_occupancy_assigned_data(){

        $query  = $this->db->select('*')
                   ->from('tbl_assigned')
                   ->join('tbl_users'   , 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
                   ->join('tbl_customer', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->join('tbl_occupancy', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                   ->where('purpose', 'Annual')
                   ->get();
        
        return $query->result();
    }

    
    
    

}
