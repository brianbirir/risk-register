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
$route['dashboard/riskregister/add'] = 'project/reg_subproject_view';
$route['dashboard/riskregister/(:num)'] = 'project/view_risk_register/$1';

// risk items
$route['dashboard/risk'] = 'risk/index';
$route['dashboard/risk/add'] = 'risk/add';
$route['dashboard/risk/(:num)'] = 'risk/single/$1'; // route to view a single risk item