<?php 
namespace Config;
$routes = Services::routes();


// User_management Module Routes
// $routes->get('/user_management/', 'User_management::index');
// $routes->get('/user_management/insert', 'User_management::insert');
// $routes->get('/user_management/update', 'User_management::update');
// $routes->get('/user_management/delete', 'User_management::delete');

$defaultNamespace = [
    'namespace' => 'User_management\Controllers',
    'filter' => 'session',
];

// General Routes
$routes->get('dashboard', 'User_management::index' , $defaultNamespace);

$routes->group('admin', $defaultNamespace, static function ($routes): void {
	$routes->get('user', 'User_management::userView');
	$routes->get('user/manage', 'User_management::manageUser');
});