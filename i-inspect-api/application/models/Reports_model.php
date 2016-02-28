<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

    public function customer_data(){
      $query = $this->db->select('*')
                    ->from('tbl_customer')
                    ->get();

            return $query->result();
    }
    
    public function customer($id){
      $query = $this->db->select('*')
                    ->from('tbl_customer')
                    ->where('building_permit_number', $id)
                    ->get();

            return $query->result();
    }

    public function architectural($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_architectural', 'tbl_architectural.archi_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();
    }


    public function electrical($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_electrical', 'tbl_electrical.electrical_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();    
    }

    public function electronics($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_electronics', 'tbl_electronics.electronics_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();        
    }

    public function mechanical($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_mechanical', 'tbl_mechanical.mechanical_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();  
    
    }

    public function plum($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_plumbing_or_sanitary', 'tbl_plumbing_or_sanitary.plumbing_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();
    
    }

    public function structural($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_structural', 'tbl_structural.structural_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->group_by('building_permit_number')
            ->get();

      return $query->result();
    
    }


    public function others($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned', 'tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_others', 'tbl_others.others_inspection_id = tbl_inspection.inspection_id' ,'inner')
            ->join('tbl_users', 'tbl_users.user_id = tbl_assigned.user_id_link', 'inner')
            ->where('building_permit_number', $id)
            ->get();

      return $query->result();
    
    }

    public function occupancy($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_occupancy', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->where('building_permit_number', $id)
            ->get();

      return $query->result();
    
    }

   function get_occupancy_one($id){
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_occupancy', 'tbl_occupancy.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->where('building_permit_number', $id)
            ->get();

        return $query->row();
   }


    public function inspection_report($id) {
        $query  = $this->db->select('*')
            ->from('tbl_customer')
            ->join('tbl_assigned','tbl_assigned.building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
            ->join('tbl_inspection', 'tbl_inspection.assigned_id_link = tbl_assigned.assigned_id' ,'inner')
            ->join('tbl_users', 'tbl_assigned.user_id_link = tbl_users.user_id' ,'inner')
            ->where('building_permit_number', $id)
            ->get();

      return $query->result();
    }


    public function total($id) {
        $query  = $this->db->select('*')
            ->from('total_occupancy_payment_view')
            ->where('building_permit_number', $id)
            ->get();

      return $query->result();
    }

    
    public function occupany_report($id){
      $query  = $this->db->select('*')
                         ->from('tbl_occupancy')
                         ->join('tbl_electrical'    , 'tbl_occupancy.electrical_id_link     = tbl_electrical.electrical_id' ,'inner')
                         ->join('tbl_electronics'   , 'tbl_occupancy.electronics_id_link    = tbl_electronics.electronics_id' ,'inner')
                         ->join('tbl_mechanical'    , 'tbl_occupancy.mechanical_id_link     = tbl_mechanical.mechanical_id' ,'inner')
                         ->join('tbl_structural'    , 'tbl_occupancy.structural_id_link     = tbl_structural.structural_id' ,'inner')
                         ->join('tbl_architectural' , 'tbl_occupancy.architectural_id_link  = tbl_architectural.architectural_id' ,'inner')
                         ->join('tbl_plumbing_or_sanitary', 'tbl_occupancy.plumbing_or_sanitary_id_link = tbl_plumbing_or_sanitary.plumbing_or_sanitary_id' ,'inner')
                         ->join('tbl_customer' , 'tbl_customer.building_permit_number  = tbl_architectural.architectural_building_permit_number_link' ,'inner')
                         ->where('occupancy_no', $id)
                         ->group_by('occupancy_no')
                         ->get();

      return $query->result();
    }

    public function total_payment($id){
      $query  = $this->db->select('*')
                         ->from('occupancy_total_payment_view')
                         ->where('occupancy_no', $id)
                         ->group_by('occupancy_no')
                         ->get();

      return $query->result();
    }

    public function architectural_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_architectural', 'tbl_architectural.architectural_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('architectural_building_permit_number_link', $id)
                         ->group_by('architectural_id')
                         ->get();

      return $query->result();
    }

    public function electrical_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_electrical', 'tbl_electrical.electrical_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('electrical_building_permit_number_link', $id)
                         ->group_by('electrical_id')
                         ->get();

      return $query->result();
    }

    public function structural_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_structural', 'tbl_structural.structural_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('structural_building_permit_number_link', $id)
                         ->group_by('structural_id')
                         ->get();

      return $query->result();
    }

    public function mechanical_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_mechanical', 'tbl_mechanical.mechanical_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('mechanical_building_permit_number_link', $id)
                         ->group_by('mechanical_id')
                         ->get();

      return $query->result();
    }


    public function electronics_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_electronics', 'tbl_electronics.electronics_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('electronics_building_permit_number_link', $id)
                         ->group_by('electronics_id')
                         ->get();

      return $query->result();
    }

    public function plumbing_or_sanitary_customer($id){
      $query  = $this->db->select('*')
                         ->from('tbl_customer')
                         ->join('tbl_plumbing_or_sanitary', 'tbl_plumbing_or_sanitary.plumbing_or_sanitary_building_permit_number_link = tbl_customer.building_permit_number' ,'inner')
                         ->where('plumbing_or_sanitary_building_permit_number_link', $id)
                         ->group_by('plumbing_or_sanitary_id')
                         ->get();

      return $query->result();
    }

}