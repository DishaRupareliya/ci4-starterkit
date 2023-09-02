<?php 
namespace Config;
$routes = Services::routes();

$settings_module_namespace = [
	'namespace' => 'Settings\Controllers',
	'filter'    => 'session'
];

$routes->group('admin',$settings_module_namespace, function($routes) {
	$routes->match(['get', 'post'],'settings', 'Settings::index');
	$routes->post('settings_view', 'Settings::settings_view');
	$routes->post('save_settings', 'Settings::saveSettings');
	$routes->post('delete/(:any)', 'Settings::deleteSettings/$1');
	$routes->post('send', 'Settings::sendTestMail');
	$routes->post('backup', 'Settings::backup');
});
