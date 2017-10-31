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

//subprojects
$route['dashboard/riskregister/add'] = 'project/reg_subproject_view';
$route['dashboard/riskregister/(:num)'] = 'project/view_registry/$1';

// risk registry
$route['dashboard/riskregistry'] = 'registry/index';
$route['dashboard/riskregistry/add'] = 'registry/add';
$route['dashboard/risk/(:num)'] = 'risk/single/$1'; # route to view a single risk item