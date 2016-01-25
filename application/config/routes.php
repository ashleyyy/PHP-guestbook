<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['entries/delete/(:any)'] = 'entries/delete/$1';
$route['entries/create'] = 'entries/create';
$route['entries/(:any)'] = 'entries/view/$1';
$route['entries'] = 'entries';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'entries';