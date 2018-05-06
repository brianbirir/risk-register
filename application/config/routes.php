<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Registration Routes
$route['signup'] = 'register/index'; // initial registration

// login and logout routes
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['change_password'] = 'login/change_password_view';

// dashboard route
$route['dashboard'] = 'dashboard/index';

// projects
$route['dashboard/project'] = 'project/index';
$route['dashboard/project/add'] = 'project/reg_project_view';
$route['dashboard/project/(:num)'] = 'project/view_project/$1';
$route['dashboard/project/edit/(:num)'] = 'project/edit_project/$1';

// risk register
$route['dashboard/riskregisters'] = 'project/view_risk_registers';
$route['dashboard/riskregister/add'] = 'project/add_register_view';
$route['dashboard/riskregister/(:num)'] = 'project/view_risk_register/$1';
$route['dashboard/riskregister/duplicate/(:num)'] = 'project/add_duplicate_view/$1';
$route['dashboard/riskregister/assign_user/(:num)'] = 'project/assign_user_view/$1';

// risk items
$route['dashboard/risks'] = 'risk/index';
$route['dashboard/risk/add/(:num)'] = 'risk/add/$1';
$route['dashboard/risk/(:num)'] = 'risk/single/$1'; // route to view a single risk item
$route['dashboard/risk/revision/(:num)'] = 'risk/revision/$1'; // route to view single risk revision
$route['dashboard/risk/edit/(:num)'] = 'risk/edit/$1'; // route to edit a risk item
$route['dashboard/risk/delete/(:num)'] = 'risk/delete/$1';
$route['dashboard/risk/archive/(:num)'] = 'risk/archive/$1';
$route['dashboard/risks/archived'] = 'risk/index_archive';
$route['dashboard/risk/duplicate_risk'] = 'risk/duplicate_risk_view';

// reports
$route['dashboard/reports/risk_project'] = 'report/select_project';
$route['dashboard/reports/response_project'] = 'report/select_response_project';
$route['dashboard/report/risk'] = 'report/index';
$route['dashboard/report/response'] = 'report/response_view';
$route['dashboard/reports/report_export'] = 'report/export_report';
$route['dashboard/reports/response_export'] = 'report/export_response_report';
$route['dashboard/response/risks/(:num)' ] = 'report/associated_risks/$1';
$route['dashboard/report/generate' ] = 'report/report_view';


// settings routes
$route['dashboard/settings'] = 'dashboard/settings';
$route['settings/role'] = 'role/index';
$route['settings/role/add'] = 'role/add';
$route['settings/role/(:num)'] = 'role/edit/$1';
$route['settings/role/delete/(:num)'] = 'role/delete/$1';

$route['settings/users'] = 'user/index';
$route['settings/user/add'] = 'user/add';
$route['settings/user/(:num)'] = 'user/edit/$1';
$route['settings/user/change-password/(:num)'] = 'user/change_password_view/$1';
$route['settings/user/delete/(:num)'] = 'user/delete/$1';
$route['settings/user/riskregister/(:num)'] = 'user/assign_register_view/$1';

$route['settings/data'] = 'settings/risk_data';
$route['settings/data/(:any)'] = 'riskdata/view/$1';
$route['settings/data/add/(:any)'] = 'riskdata/add_view/$1';
$route['settings/data/edit/(:any)/(:any)'] = 'riskdata/edit_view/$1/$2';
$route['settings/data/delete/(:any)/(:any)'] = 'riskdata/delete/$1/$2';

$route['settings/data/cost/(:num)'] = 'cost/index_cost/$1';
$route['settings/data/cost/add'] = 'cost/add_cost_view';
$route['settings/data/cost/edit/(:num)'] = 'cost/edit_cost_view/$1';
$route['settings/data/cost/delete/(:num)'] = 'cost/delete/$1';

$route['settings/data/schedule/(:num)'] = 'schedule/index_schedule/$1';
$route['settings/data/schedule/add'] = 'schedule/add_schedule_view';
$route['settings/data/schedule/edit/(:num)'] = 'schedule/edit_schedule_view/$1';
$route['settings/data/schedule/delete/(:num)'] = 'schedule/delete/$1';

$route['settings/data/response/(:num)'] = 'response/index_response/$1';
$route['settings/data/response/add'] = 'response/add_response_view';
$route['settings/data/response/edit/(:num)'] = 'response/edit_response_view/$1';
$route['settings/data/response/delete/(:num)'] = 'response/delete/$1';

$route['settings/data/subcategory/(:num)'] = 'subcategory/index_subcategory/$1';
$route['settings/data/subcategory/add/(:num)'] = 'subcategory/add_subcategory_view/$1';
$route['settings/data/subcategory/edit/(:num)'] = 'subcategory/edit_subcategory_view/$1';
$route['settings/data/subcategory/delete/(:num)'] = 'subcategory/delete/$1';


// email routes
$route['email/response'] = 'email/send_response_notification';