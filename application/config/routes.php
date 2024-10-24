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
$route['survey/detail_mobile/(:any)'] 	= 'Home/detail_mobile/$1';
$route['survey/entry_mobile/(:any)'] 	= 'Home/entry_mobile/$1';
$route['survey/do_create_mobile'] 	= 'Home/do_create_mobile';
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
	$route['dashboard/master/warehouse/data-update'] 						= 'admin/master/Warehouse/index_update';
	$route['dashboard/master/warehouse/create'] 			= 'admin/master/Warehouse/create';
	$route['dashboard/master/warehouse/do_create'] 		= 'admin/master/Warehouse/do_create';
	$route['dashboard/master/warehouse/edit/(:any)'] 	= 'admin/master/Warehouse/edit/$1';
	$route['dashboard/master/warehouse/do_update'] 		= 'admin/master/Warehouse/do_update';
	$route['dashboard/master/warehouse/detail/(:any)'] 	= 'admin/master/Warehouse/detail/$1';
	$route['dashboard/master/warehouse/delete/(:any)']	= 'admin/master/Warehouse/delete/$1';

	$route['dashboard/master/klasifikasi'] 						= 'admin/master/Klasifikasi';
	$route['dashboard/master/klasifikasi/create'] 			= 'admin/master/Klasifikasi/create';
	$route['dashboard/master/klasifikasi/do_create'] 		= 'admin/master/Klasifikasi/do_create';
	$route['dashboard/master/klasifikasi/edit/(:any)'] 	= 'admin/master/Klasifikasi/edit/$1';
	$route['dashboard/master/klasifikasi/do_update'] 		= 'admin/master/Klasifikasi/do_update';
	$route['dashboard/master/klasifikasi/detail/(:any)'] 	= 'admin/master/Klasifikasi/detail/$1';
	$route['dashboard/master/klasifikasi/delete/(:any)']	= 'admin/master/Klasifikasi/delete/$1';
	

	$route['dashboard/master/kategori'] 						= 'admin/master/Kategori';
	$route['dashboard/master/kategori/create'] 			= 'admin/master/Kategori/create';
	$route['dashboard/master/kategori/do_create'] 		= 'admin/master/Kategori/do_create';
	$route['dashboard/master/kategori/edit/(:any)'] 	= 'admin/master/Kategori/edit/$1';
	$route['dashboard/master/kategori/do_update'] 		= 'admin/master/Kategori/do_update';
	$route['dashboard/master/kategori/detail/(:any)'] 	= 'admin/master/Kategori/detail/$1';
	$route['dashboard/master/kategori/delete/(:any)']	= 'admin/master/Kategori/delete/$1';

	$route['dashboard/master/districts'] 				= 'admin/master/districts';
	$route['dashboard/master/districts/create'] 		= 'admin/master/districts/create';
	$route['dashboard/master/districts/do_create'] 		= 'admin/master/districts/do_create';
	$route['dashboard/master/districts/edit/(:any)'] 	= 'admin/master/districts/edit/$1';
	$route['dashboard/master/districts/do_update'] 		= 'admin/master/districts/do_update';
	$route['dashboard/master/districts/detail/(:any)'] 	= 'admin/master/districts/detail/$1';
	$route['dashboard/master/districts/delete/(:any)']	= 'admin/master/districts/delete/$1';
/* MASTER DATA ROUTES */

/* ENTRY ROUTES */
	$route['dashboard/survey'] 											= 'admin/Survey/index';
	$route['dashboard/survey/data-update'] 								= 'admin/Survey/index_update';
	$route['dashboard/survey/entry'] 								= 'admin/Survey/entry';
	$route['dashboard/survey/ajax_location_detail'] = 'admin/Survey/ajax_location_detail';
	$route['dashboard/survey/do_create'] 	= 'admin/Survey/do_create';
	$route['dashboard/survey/detail/(:any)'] = 'admin/Survey/detail/$1';
	$route['dashboard/survey/edit/(:any)'] 	= 'admin/Survey/edit/$1';
	$route['dashboard/survey/do_update'] 	= 'admin/Survey/do_update';
	$route['dashboard/survey/drawing'] 	= 'admin/Survey/drawing';
	$route['dashboard/visit/export/(:any)'] = 'admin/Visit/export/$1';

	$route['dashboard/survey/report-by-districts'] 											= 'admin/Survey/report';

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

	$route['dashboard/attendance'] 						= 'admin/Attendance/index';
	$route['dashboard/attendance/create'] 				= 'admin/Attendance/create';
	$route['dashboard/attendance/do-attend'] 		    = 'admin/Attendance/do_attend';

	$route['dashboard/warehouse'] 						= 'admin/Warehouse';
	$route['dashboard/warehouse/data-update'] 			= 'admin/Warehouse/index_update';
	$route['dashboard/warehouse/entry'] 				= 'admin/Warehouse/entry';
	$route['dashboard/warehouse/do_create'] 			= 'admin/Warehouse/do_create';
	$route['dashboard/warehouse/edit/(:any)'] 			= 'admin/Warehouse/edit/$1';
	$route['dashboard/warehouse/do_update'] 			= 'admin/Warehouse/do_update';
	$route['dashboard/warehouse/detail/(:any)'] 		= 'admin/Warehouse/detail/$1';
	$route['dashboard/warehouse/delete/(:any)']			= 'admin/Warehouse/delete/$1';

	$route['dashboard/survey-excel'] 								= 'admin/SurveyExcel/index';
	$route['dashboard/survey-excel/data-update'] 		= 'admin/SurveyExcel/index_update';
	$route['dashboard/survey-excel/entry'] 					= 'admin/SurveyExcel/entry';
	$route['dashboard/survey-excel/do_create'] 			= 'admin/SurveyExcel/do_create';
	$route['dashboard/survey-excel/detail/(:any)'] 	= 'admin/SurveyExcel/detail/$1';
	$route['dashboard/survey-excel/edit/(:any)'] 		= 'admin/SurveyExcel/edit/$1';
	$route['dashboard/survey-excel/do_update'] 			= 'admin/SurveyExcel/do_update';
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
$route['ajax/load/kota'] 	= 'Home/ajax_load_kota';
$route['ajax/load/desa'] 	= 'Home/ajax_load_desa';

$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
