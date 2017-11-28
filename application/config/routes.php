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

// dashboard route
$route['dashboard'] = 'dashboard/index';

// projects
$route['dashboard/project'] = 'project/index';
$route['dashboard/project/add'] = 'project/reg_project_view';
$route['dashboard/project/(:num)'] = 'project/view_project/$1';

// risk register
$route['dashboard/riskregisters'] = 'project/view_risk_registers';
$route['dashboard/riskregister/add'] = 'project/reg_subproject_view';
$route['dashboard/riskregister/(:num)'] = 'project/view_risk_register/$1';

// risk items
$route['dashboard/risks'] = 'risk/index';
$route['dashboard/risk/add'] = 'risk/add';
$route['dashboard/risk/(:num)'] = 'risk/single/$1'; // route to view a single risk item
$route['dashboard/risk/edit/(:num)'] = 'risk/edit/$1'; // route to edit a risk item
$route['dashboard/risk/delete/(:num)'] = 'risk/delete/$1';

// reports
$route['dashboard/reports'] = 'report/index';
$route['dashboard/reports/filter'] = 'report/export';


// settings routes
$route['dashboard/settings'] = 'dashboard/settings';
$route['settings/role'] = 'role/index';
$route['settings/role/add'] = 'role/add';
$route['settings/role/(:num)'] = 'role/edit/$1';
$route['settings/role/delete/(:num)'] = 'role/delete/$1';
$route['settings/users'] = 'user/index';
$route['settings/user/add'] = 'user/add';
$route['settings/user/(:num)'] = 'user/edit/$1';
$route['settings/user/delete/(:num)'] = 'user/delete/$1';
$route['settings/user/riskregister/(:num)'] = 'user/assign_register_view/$1';
$route['settings/data'] = 'data/index';

$route['settings/data/status'] = 'status/index_status';
$route['settings/data/status/add'] = 'status/add_status_view';
$route['settings/data/status/edit/(:num)'] = 'status/edit_status_view/$1';
$route['settings/data/status/delete/(:num)'] = 'status/delete/$1';