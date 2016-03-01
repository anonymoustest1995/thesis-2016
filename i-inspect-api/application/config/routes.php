<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



$route = array(
    'default_controller'                    => 'Users/login',
    'translate_uri_dashes'                  => FALSE,
    '404_override'                          => '',

    'login'                                 => 'Users/login',
    'logout'                                => 'Users/logout',

    'admin/save-user-information'           => 'Users/save_user_info',
    'admin/save-user-update-information'    => 'Users/save_user_update',

    'admin/save-position-information'       => 'Admin/save_position_info',
    'admin/save-inspection-type-information'=> 'Admin/save_inspection_type_info',
    'admin/save-assign-information'         => 'Admin/save_assign_information',
    'admin/save-approved-information'       => 'Admin/save_approved_information',
    'admin/save-assign-annual-information'  => 'Admin/save_assign_annual_information',
    'admin/save-inspection-type-information'=> 'Admin/save_inspection_type_information',
    'admin/save-inspection-area-information'=> 'Admin/save_inspection_area_information',

    'admin/users-lists'                     => 'Users/users_list',
    'admin/customer-form/:any'              => 'Admin/customer_form/index/$id',
    'admin/customer-annual-assign-form/:any'=> 'Admin/customer_annual_assign_form/index/$id',
    'admin/inspection-type-area-details/:any'=> 'Admin/inspection_type_area_details/index/$id',
    'admin/dashboard'                       => 'Admin/admin_dashboard',
    'admin/reports'                         => 'Admin/reports',

    'admin/assign'                          => 'Admin/assign',
    'admin/profile'                         => 'Admin/profile',
    'admin/assign-annual'                   => 'Admin/assign_annual',
    'admin/assign-details'                  => 'Admin/assign_details',
    'admin/assign-details-annual'           => 'Admin/assign_details_annual',
    'admin/inspection-areas'                => 'Admin/inspection_areas',

    'admin/detailed-reports/:any'           => 'Admin/view_detailed_report/index/$id',
    'admin/detailed-occupancy-reports/:any' => 'Admin/view_occupancy_report/index/$id',

    'admin/pending-reports'                 => 'Admin/pending_reports',
    'admin/approved-reports'                => 'Admin/approved_reports',

    'admin/final-reports/:any'              => 'Admin/final_reports/index/$id',
    
    'get-assign-data/(:any)'                => 'Get_assign/index/$1',
    'get-customer-data/(:any)'              => 'Get_data/index/$1',
    'get-assign-customer-data/(:any)'       => 'Get_customer/index/$1',



 
    
);
