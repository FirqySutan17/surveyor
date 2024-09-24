<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Home';
$route['home'] 					= 'Home';

/* ADMIN ROUTES */
$route['login_dashboard'] 		= 'auth/login';
$route['login'] 				= 'auth/login_dashboard';
$route['logout'] 				= 'auth/logout';
$route['dashboard'] 			= 'admin/dashboard';
$route['profile'] 				= 'Home/profile';
$route['profile/do_update'] 	= 'Home/profile_update';
$route['visit/detail_mobile/(:any)'] 	= 'Home/detail_mobile/$1';
$route['visit/entry_mobile/(:any)'] 	= 'Home/entry_mobile/$1';
$route['visit/do_create_mobile'] 	= 'Home/do_create_mobile';
/* MASTER DATA ROUTES */
	$route['dashboard/master/common_code'] 				= 'admin/master/CommonCode';
	$route['dashboard/master/common_code/create'] 		= 'admin/master/CommonCode/create';
	$route['dashboard/master/common_code/do_create'] 	= 'admin/master/CommonCode/do_create';
	$route['dashboard/master/common_code/edit/(:any)'] 	= 'admin/master/CommonCode/edit/$1';
	$route['dashboard/master/common_code/do_update'] 	= 'admin/master/CommonCode/do_update';
	$route['dashboard/master/common_code/delete/(:any)']	= 'admin/master/CommonCode/do_delete/$1';

	$route['dashboard/master/customer'] 						= 'admin/master/Customer';
	$route['dashboard/master/customer/edit/(:any)'] = 'admin/master/Customer/edit/$1';
	$route['dashboard/master/customer/do_update'] 	= 'admin/master/Customer/do_update';
	$route['dashboard/master/employee'] 						= 'admin/master/Employee';

	$route['dashboard/master/user'] 				= 'admin/master/User';
	$route['dashboard/master/user/create'] 			= 'admin/master/User/create';
	$route['dashboard/master/user/do_create'] 		= 'admin/master/User/do_create';
	$route['dashboard/master/user/edit/(:any)'] 	= 'admin/master/User/edit/$1';
	$route['dashboard/master/user/do_update'] 		= 'admin/master/User/do_update';
	$route['dashboard/master/user/detail/(:any)'] 	= 'admin/master/User/detail/$1';
	$route['dashboard/master/user/delete/(:any)']	= 'admin/master/User/delete/$1';
	$route['dashboard/master/user/duplicate'] 		= 'admin/master/User/duplicate';
	$route['dashboard/master/user/do_duplicate'] 	= 'admin/master/User/do_duplicate';
	$route['dashboard/master/user/excel'] 				= 'admin/master/User/excel';
	$route['dashboard/master/warehouse'] 						= 'admin/master/Warehouse';
/* MASTER DATA ROUTES */

/* ENTRY ROUTES */
	$route['dashboard/survey'] 											= 'admin/Survey/index';
	$route['dashboard/survey/entry'] 								= 'admin/Survey/entry';
	$route['dashboard/survey/ajax_location_detail'] = 'admin/Survey/ajax_location_detail';
	$route['dashboard/visit/do_create'] 	= 'admin/Visit/do_create';
	$route['dashboard/visit/detail/(:any)'] = 'admin/Visit/detail/$1';
	$route['dashboard/visit/detail-customer/(:any)'] = 'admin/Visit/detail_customer/$1';
	$route['dashboard/visit/edit/(:any)'] 	= 'admin/Visit/edit/$1';
	$route['dashboard/visit/do_update'] 	= 'admin/Visit/do_update';
	$route['dashboard/visit/export/(:any)'] = 'admin/Visit/export/$1';

	$route['dashboard/remainder'] 					= 'admin/Remainder/index';
	$route['dashboard/remainder/entry'] 		= 'admin/Remainder/entry';
	$route['dashboard/remainder/do_create'] = 'admin/Remainder/do_create';

	$route['dashboard/collector'] 						= 'admin/Collector/index';
	$route['dashboard/collector/create'] 			= 'admin/Collector/create';
	$route['dashboard/collector/do_create'] 	= 'admin/Collector/do_create';
	$route['dashboard/collector/upload'] 			= 'admin/Collector/upload';
	$route['dashboard/collector/do_upload'] 	= 'admin/Collector/do_upload';
	$route['dashboard/collector/edit/(:any)'] = 'admin/Collector/edit/$1';
	$route['dashboard/collector/do_update'] 	= 'admin/Collector/do_update';
/* ENTRY ROUTES */

// REPORT ROUTES
	$route['dashboard/visit/report'] 									= 'admin/Visit/report';
	$route['dashboard/visit/report-customer'] 				= 'admin/Visit/report_customer';
	$route['dashboard/overdue-deblist/report'] 				= 'admin/Visit/report_overdue';
	$route['dashboard/overdue-deblist/report/excel'] 	= 'admin/Visit/report_overdue_excel';
	$route['dashboard/visit/report-collector'] 				= 'admin/Visit/report_collector';
	$route['dashboard/visit/report-collector/excel'] 	= 'admin/Visit/report_collector_excel';
// REPORT ROUTES

$route['dashboard/summary-report'] 					= 'admin/Dashboard/summary_report';
/*ADMIN ROUTES */

$route['ajax/load/customer'] 			= 'Home/ajax_load_customer';
$route['ajax/load/employee'] 			= 'Home/ajax_load_employee';
$route['ajax/load/group_customer_reminder'] 	= 'Home/ajax_load_group_customer_reminder';
$route['ajax/load/customer_reminder'] 	= 'Home/ajax_load_customer_reminder';

$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
