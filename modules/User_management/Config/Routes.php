<?php 
namespace Config;
$routes = Services::routes();

$defaultNamespace = [
    'namespace' => 'User_management\Controllers',
    'filter' => 'session',
];

// General Routes
$routes->get('dashboard', 'User_management::index' , $defaultNamespace);

$routes->group('admin', $defaultNamespace, static function ($routes): void {
	$routes->get('user', 'User_management::userView');
	$routes->get('user/manage', 'User_management::manageUser');
	$routes->post('user/saveUser', 'User_management::saveUser');
});