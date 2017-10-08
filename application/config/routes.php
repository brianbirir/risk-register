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