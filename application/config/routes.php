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

// risk register
$route['dashboard/riskregisters'] = 'project/view_risk_registers';
$route['dashboard/riskregister/add'] = 'project/add_register_view';
$route['dashboard/riskregister/(:num)'] = 'project/view_risk_register/$1';
$route['dashboard/riskregister/duplicate/(:num)'] = 'project/add_duplicate_view';

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
$route['settings/data'] = 'settings/risk_data';

$route['settings/data/status'] = 'status/index_status';
$route['settings/data/status/add'] = 'status/add_status_view';
$route['settings/data/status/edit/(:num)'] = 'status/edit_status_view/$1';
$route['settings/data/status/delete/(:num)'] = 'status/delete/$1';

$route['settings/data/safety'] = 'safety/index_safety';
$route['settings/data/safety/add'] = 'safety/add_safety_view';
$route['settings/data/safety/edit/(:num)'] = 'safety/edit_safety_view/$1';
$route['settings/data/safety/delete/(:num)'] = 'safety/delete/$1';

$route['settings/data/category'] = 'category/index_category';
$route['settings/data/category/add'] = 'category/add_category_view';
$route['settings/data/category/edit/(:num)'] = 'category/edit_category_view/$1';
$route['settings/data/category/delete/(:num)'] = 'category/delete/$1';

$route['settings/data/strategy'] = 'strategy/index_strategy';
$route['settings/data/strategy/add'] = 'strategy/add_strategy_view';
$route['settings/data/strategy/edit/(:num)'] = 'strategy/edit_strategy_view/$1';
$route['settings/data/strategy/delete/(:num)'] = 'strategy/delete/$1';

$route['settings/data/owner'] = 'owner/index_owner';
$route['settings/data/owner/add'] = 'owner/add_owner_view';
$route['settings/data/owner/edit/(:num)'] = 'owner/edit_owner_view/$1';
$route['settings/data/owner/delete/(:num)'] = 'owner/delete/$1';

$route['settings/data/entity'] = 'entity/index_entity';
$route['settings/data/entity/add'] = 'entity/add_entity_view';
$route['settings/data/entity/edit/(:num)'] = 'entity/edit_entity_view/$1';
$route['settings/data/entity/delete/(:num)'] = 'entity/delete/$1';

$route['settings/data/materialization'] = 'materialization/index_materialization';
$route['settings/data/materialization/add'] = 'materialization/add_materialization_view';
$route['settings/data/materialization/edit/(:num)'] = 'materialization/edit_materialization_view/$1';
$route['settings/data/materialization/delete/(:num)'] = 'materialization/delete/$1';

$route['settings/data/cost'] = 'cost/index_cost';
$route['settings/data/cost/add'] = 'cost/add_cost_view';
$route['settings/data/cost/edit/(:num)'] = 'cost/edit_cost_view/$1';
$route['settings/data/cost/delete/(:num)'] = 'cost/delete/$1';

$route['settings/data/schedule'] = 'schedule/index_schedule';
$route['settings/data/schedule/add'] = 'schedule/add_schedule_view';
$route['settings/data/schedule/edit/(:num)'] = 'schedule/edit_schedule_view/$1';
$route['settings/data/schedule/delete/(:num)'] = 'schedule/delete/$1';

// test pages
$route['test/reponse'] = 'risk/response_view';
$route['test'] = 'risk/register_response';