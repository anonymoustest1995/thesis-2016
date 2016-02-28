<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // Load Models
        $this->load->model('admin_model');
        $this->load->model('users_model');
        $this->load->model('reports_model');
        $this->load->model('assign_model');

        $this->load->library('ci_qr_code');
        $this->config->load('qr_code');

    }

    /*
    * Show Admin Dashboard
    */
    public function admin_dashboard ()
    {
        $data = $this->users_model->count_users();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Admin Dashboard',
                'count'=> $data,
            )
        );
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/footer');
    }


    /*
    * Reports
    */
    public function reports ()
    {
        $this->load->view('layouts/header',
            array(
                'title' => 'Reports',
            )
        );
        $this->load->view('reports/reports-home');
        $this->load->view('layouts/footer');
    }

    public function pending_reports ()
    {
        $data = $this->reports_model->customer_data();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Pending Reports',
                'customer'=> $data,
            )
        );
        $this->load->view('reports/pending-reports');
        $this->load->view('layouts/footer');
    }

    public function approved_reports ()
    {
        $occupany = $this->admin_model->customer_approved_data();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Approved Reports',
                'occupany'=> $occupany,
            )
        );
        $this->load->view('reports/approved-reports');
        $this->load->view('layouts/footer');
    }

    public function view_occupancy_report ()
    {
        $id   = $this->uri->segment(3);
        $data = $this->reports_model->customer($id);
        $architectural = $this->reports_model->architectural($id);
        $electrical = $this->reports_model->electrical($id);
        $electronics = $this->reports_model->electronics($id);
        $mechanical = $this->reports_model->mechanical($id);
        $plum = $this->reports_model->plum($id);
        $structural = $this->reports_model->structural($id);
        $others = $this->reports_model->others($id);
        $occupancy = $this->reports_model->occupancy($id);

        $this->load->view('reports/header',
            array(
                'title' => 'Customer Occupancy Detailed Report',
                'customer'=> $data,
                'architectural'=> $architectural,
                'electrical'=> $electrical,
                'electronics'=> $electronics,
                'mechanical'=> $mechanical,
                'plum'=> $plum,
                'structural'=> $structural,
                'others'=> $others,
                'occupancy'=> $occupancy,
            )
        );
        $this->load->view('reports/detailed-occupancy-reports');
        $this->load->view('reports/footer');

    }

    public function view_detailed_report()
    {
        $id   = $this->uri->segment(3);
        $data = $this->reports_model->customer($id);
        $architectural = $this->reports_model->architectural($id);
        $electrical = $this->reports_model->electrical($id);
        $electronics = $this->reports_model->electronics($id);
        $mechanical = $this->reports_model->mechanical($id);
        $plum = $this->reports_model->plum($id);
        $structural = $this->reports_model->structural($id);
        $others = $this->reports_model->others($id);


        $this->load->view('reports/header',
            array(
                'title' => 'Customer Detailed Report',
                'customer'=> $data,
                'architectural'=> $architectural,
                'electrical'=> $electrical,
                'electronics'=> $electronics,
                'mechanical'=> $mechanical,
                'plum'=> $plum,
                'structural'=> $structural,
                'others'=> $others,
            )
        );
        $this->load->view('reports/customer-detailed-report');
        $this->load->view('reports/footer');
    }


    public function final_reports()
    {
        $id   = $this->uri->segment(3);

        $qr_code_config = array(); 
            $qr_code_config['cacheable']    = $this->config->item('cacheable');
            $qr_code_config['cachedir']     = $this->config->item('cachedir');
            $qr_code_config['imagedir']     = $this->config->item('imagedir');
            $qr_code_config['errorlog']     = $this->config->item('errorlog');
            $qr_code_config['ciqrcodelib']  = $this->config->item('ciqrcodelib');
            $qr_code_config['quality']      = $this->config->item('quality');
            $qr_code_config['size']         = $this->config->item('size');
            $qr_code_config['black']        = $this->config->item('black');
            $qr_code_config['white']        = $this->config->item('white');

            $this->ci_qr_code->initialize($qr_code_config);

            $cust_details = $this->reports_model->get_occupancy_one($id);
            $image_name = $id . ".png";
            
            $codeContents = "Occupancy Permit Number: ";
             $codeContents .= $cust_details->occupancy_number  ."\n\nCustomer Name: " . $cust_details->customer_lastname . ", " . $cust_details->customer_firstname ." ". $cust_details->customer_middlename . "\n\nAddress: " . "#" .$cust_details->customer_address_no . " " . $cust_details->customer_address_street . ", " . $cust_details->customer_address_barangay . ", " . $cust_details->customer_address_city_or_municipality . "\n\nForm of Ownership: " . $cust_details->customer_form_of_ownership . "\n\nContact: " . $cust_details->customer_tel_no . "\n\nAddress Constructed: " . "#" . $cust_details->customer_location_address_no . " " . $cust_details->customer_location_address_street . ", " . $cust_details->customer_location_address_barangay . ", " . $cust_details->customer_location_address_city_or_municipality;

            $params['data'] = $codeContents;
            $params['level'] = 'H';
            $params['size'] = 2;

            $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
            $this->ci_qr_code->generate($params);


        $total = $this->reports_model->total($id);
        $occupancy = $this->reports_model->occupancy($id);
        $architectural = $this->reports_model->architectural($id);
        $electrical = $this->reports_model->electrical($id);
        $electronics = $this->reports_model->electronics($id);
        $mechanical = $this->reports_model->mechanical($id);
        $plum = $this->reports_model->plum($id);
        $structural = $this->reports_model->structural($id);
        $others = $this->reports_model->others($id);


        $this->load->view('reports/header',
            array(
                'title' => 'Customer Final Report',
                'total'   => $total,
                'occupancy'=> $occupancy,
                'architectural'=> $architectural,
                'electrical'=> $electrical,
                'electronics'=> $electronics,
                'mechanical'=> $mechanical,
                'plum'=> $plum,
                'structural'=> $structural,
                'others'=> $others,
            )
        );
        $this->load->view('reports/final-report');        
        $this->load->view('reports/footer');
    }


    public function customer_form()
    {   
        $assigned = $this->admin_model->assigned_data();
        $id   = $this->uri->segment(3);
        $data = $this->admin_model->customer_data($id);
        $users = $this->admin_model->users_data();
        $position = $this->admin_model->get_positions();

        $this->load->view('layouts/customer-header',
            array(
                'title' => 'Customer Details',
                'datas' => $data,
                'assigned' => $assigned,
                'users' => $users,
                'position' => $position,
            )
        );
        $this->load->view('admin/customer_form');
        $this->load->view('layouts/footer');
    }

    public function assign_details ()
    {   
        $assigned = $this->admin_model->assigned_data();

        $this->load->view('layouts/header',
            array(
                'title' => 'Inspection Assigned Occupancy Details',
                'assigned' => $assigned,
            )
        );
        $this->load->view('admin/assign-details');
        $this->load->view('layouts/footer');
    }

    public function assign_details_annual ()
    {   
        $assigned = $this->admin_model->assigned_data();

        $this->load->view('layouts/header',
            array(
                'title' => 'Inspection Assigned Annual Details',
                'assigned' => $assigned,
            )
        );
        $this->load->view('admin/assign-details-annual');
        $this->load->view('layouts/footer');
    }


    public function save_position_info()
    {
       // Remove form validation error message delimeter
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run('positions') === FALSE) {
                echo json_encode(
                    array(
                        'notification' => 'Validation error',
                        'error'        => array(
                            'position_description' => form_error('position_description'),
                        )
                    )
                );
            } else {

                $confirm = $this->admin_model->save_position_data(
                    array(
                        'position_description' => $this->input->post('position_description', TRUE),
                        )
                );

                echo ($confirm) ? json_encode(array('notification' => 'Position Added Successfully')) : json_encode(array('notification' => 'Failed Addition'));
            }
    }

     public function save_assign_information()
    {
        $this->db->trans_begin();
        
        $myID = $this->input->post('building_permit_number', TRUE);
        $check = $this->admin_model->checkdata($myID);

        if ($check) {
        }
        else {
            $id = $this->admin_model->save_assign_customer_data(
                array(
                    'building_permit_number'    => $this->input->post('building_permit_number', TRUE),
                    'customer_lastname'         => $this->input->post('customer_lastname', TRUE),
                    'customer_firstname'        => $this->input->post('customer_firstname', TRUE),
                    'customer_middlename'       => $this->input->post('customer_middlename', TRUE),
                    'customer_tin_no'           => $this->input->post('customer_tin_no', TRUE),
                    'customer_form_of_ownership'=> $this->input->post('customer_form_of_ownership', TRUE),
                    'customer_address_no'       => $this->input->post('customer_address_no', TRUE),
                    'customer_address_street'   => $this->input->post('customer_address_street', TRUE),
                    'customer_address_barangay' => $this->input->post('customer_address_barangay', TRUE),
                    'customer_address_city_or_municipality' => $this->input->post('customer_address_city_or_municipality', TRUE),
                    'customer_tel_no'                   => $this->input->post('customer_tel_no', TRUE),
                    'customer_location_address_no'      => $this->input->post('customer_location_address_no', TRUE),
                    'customer_location_address_street'  => $this->input->post('customer_location_address_street', TRUE),
                    'customer_location_address_barangay'=> $this->input->post('customer_location_address_barangay', TRUE),
                    'customer_location_address_city_or_municipality' => $this->input->post('customer_location_address_city_or_municipality', TRUE),
                    'occupancy_type_description' => $this->input->post('occupancy_type_description', TRUE),
                    )
            );
        }
        $confirm = $this->admin_model->save_assign_data(
            array(
                'building_permit_number_link'=> $this->input->post('building_permit_number', TRUE),
                'user_id_link'               => $this->input->post('user_id_link', TRUE),
                'purpose'                    => $this->input->post('purpose', TRUE),
                )
        );


        echo ($confirm) ? json_encode(array('notification' => 'Added Successfully')) : json_encode(array('notification' => 'Failed Addition'));
       
           if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }
    }  
    
    public function save_approved_information ()
    {
        $myID = $this->input->post('building_permit_number_link', TRUE);
        $check = $this->admin_model->check_occupancy($myID);

        if ($check) {
            echo ($check) ? json_encode(array('notification' => 'Already Approved !')) : json_encode(array('notification' => 'Failed Addition'));
        } else {

        $confirm = $this->admin_model->save_approved_data(
            array(
                'building_permit_number_link' => $this->input->post('building_permit_number_link', TRUE),
                )
            );

        echo ($confirm) ? json_encode(array('notification' => 'Approved Successfully !')) : json_encode(array('notification' => 'Failed Addition'));
        }
    }

    public function save_assign_annual_information ()
    {

        $confirm = $this->admin_model->save_assign_data(
                array(
                    'building_permit_number_link'=> $this->input->post('building_permit_number_link', TRUE),
                    'user_id_link'               => $this->input->post('user_id_link', TRUE),
                    'purpose'                    => $this->input->post('purpose', TRUE),
                    )
            );

            echo ($confirm) ? json_encode(array('notification' => 'Assigned Successfully')) : json_encode(array('notification' => 'Failed Addition'));
    }


    public function delete_assign () 
    {
        $id = $this->uri->segment(3);
        $this->admin_model->assign_delete($id);
        if ($id  > 0) 
            {
               echo json_encode('Record Successfully Deleted');
                redirect('admin/assign');
            }
            else 
            {   
                echo "<script language='javascript' type='text/javascript'>alert('Record Deletion Failed!')</script>";
            }
    }
    public function save_inspection_type_info()
    {
       // Remove form validation error message delimeter
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run('inspection_type') === FALSE) {
                echo json_encode(
                    array(
                        'notification' => 'Validation error',
                        'error'        => array(
                            'inspection_type_description' => form_error('inspection_type_description'),
                        )
                    )
                );
            } else {

                $confirm = $this->admin_model->save_inspection_type_data(
                    array(
                        'inspection_type_description' => $this->input->post('inspection_type_description', TRUE),
                        )
                );

                echo ($confirm) ? json_encode(array('notification' => 'Inspection Type Added Successfully')) : json_encode(array('notification' => 'Failed Addition'));
            }
    } 


    public function profile()
    {

    }

    /*
    * Show Assign Inspection Page
    *////////////////////////
    public function assign ()
    {
        $data = $this->assign_model->get_bpms();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Assign Inspection',
                'data'=> $data,
            )
        );
        $this->load->view('admin/assign');
        $this->load->view('layouts/footer');
    }

    /*
    * Show Assign Inspection Page
    *////////////////////////
    public function assign_annual ()
    {
        $data = $this->assign_model->get_occupancy_data();
      
        $this->load->view('layouts/header',
            array(
                'title' => 'Assign Annual Inspector',
                'data'=> $data,
            )
        );
        $this->load->view('admin/assign-annual');
        $this->load->view('layouts/footer');
    }

    public function customer_annual_assign_form()
    {   
        $id   = $this->uri->segment(3);
        $data = $this->assign_model->get_customer_occupancy($id);
        $users = $this->admin_model->users_data($id);
        $assigned = $this->assign_model->get_occupancy_assigned_data();

        $this->load->view('layouts/customer-header',
            array(
                'title' => 'Customer Details',
                'data' => $data,
                'users' => $users,
                'assigned' => $assigned,
            )
        );
        $this->load->view('assign/customer-annual-assign-form');
        $this->load->view('layouts/footer');
    }
}
