<?php

class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_all(){
        return $this->db->get('tbl_users')->result_object();
    }

    public function get_all_inspection_type(){
        return $this->db->get('tbl_inspection_type')->result_object();
    }

    public function get_architectural_users ()
    {
        $query = $this->db->select('*')
                          ->from('tbl_users')
                          ->where('user_position_link','Architectural Inspector')
                          ->order_by('user_id', 'asc')
                          ->get();

        return $query->result();
    }


    /*
    * Insert User Data to Database
    */
    public function save_user_data ($data)
    {
        // $this->db->trans_start();
        $this->db->insert('tbl_users', $data);
        $insert_id = $this->db->insert_id();
        // $this->db->trans_complete();

        return  $insert_id;
    }
    
    /*
    * Delete User
    */
    public function delete ($id) 
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tbl_users');
    }

    /*
    * Get User Data to Update
    */
    function update ($id)
    {
        $query = $this->db->select('*')
                          ->from('tbl_users')
                          ->where('user_id', $id)
                          ->get();

        return $query->result();

    }

    /**
     * Save Updated User Data
     */
   public function save_update_user_data ($id, $data)
     {
       $this->db->where('user_id', $id);
       $this->db->update('tbl_users', $data); 
     }

    /*
    * Get User's username credential
    */
    public function get_users_credential ($username)
    {
        $query = $this->db->limit(1)
                          ->where('user_username', $username)
                          ->get('tbl_users');
        
        return $query->row();
    }


    /*
    * Get User's Position
    */
    public function get_user_position(){
        $query = $this->db->select('*')
                          ->from('tbl_positions')
                          ->get();

        return $query->result();
    }

    /*
    * Check if Username Exists
    */
    public function check_if_username_exists($username)
    {
        $this->db->where('user_username', $username);
        $result = $this->db->get('tbl_users');

        if ($result->num_rows() > 0) {
            return FALSE;
        }else {
            return TRUE;
        }
    }

    /*
    * Check if Email Exists
    */
    public function check_if_email_exists($email)
    {
        $this->db->where('user_email', $email);
        $result = $this->db->get('tbl_users');

        if ($result->num_rows() > 0) {
            return FALSE;
        }else {
            return TRUE;
        }
    }

    /*
    * Get User's Record
    */
    public function get_record ()
    {
        $query = $this->db->select('*')
                          ->from('tbl_users')
                          ->order_by('user_id', 'desc')
                          ->get();

        return $query->result();
    }

    /*
    * Count all number of users
    */
    public function count_users ()
    {
        $query = $this->db->select ('*')
                          ->from ('user_count_view')
                          ->get();
         return $query->result();
    }


}
