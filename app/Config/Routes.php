<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Front::home');
$routes->get('/room_details/(:num)', 'Front::single/$1');
$routes->get('/room_booking/(:num)', 'Front::booking/$1');
$routes->post('/roombook', 'Front::roombook');
$routes->get('/initiatePayment/(:num)', 'Front::initiatePayment/$1');
$routes->get('/payment', 'Front::initiatePayment');
$routes->get('/processPayment', 'Front::processPayment');
$routes->get('/success', 'Front::success');
$routes->get('/failure', 'Front::failure');
$routes->get('/getBookedDates/(:num)', 'Front::getBookedDates/$1');
$routes->get('login', 'Front::login');
$routes->get('logout', 'Front::logout');
$routes->post('user_login', 'Front::user_login');
$routes->get('signup', 'Front::user_create');
$routes->post('signup_save', 'Front::user_save');


$routes->group('admin', function($routes) {
    $routes->get('', 'Admin::home');
    $routes->get('booking', 'Admin::booking');
    $routes->get('booking_admin', 'Admin::booking_admin');
    $routes->get('rooms', 'Admin::rooms');
    $routes->get('room_add', 'Admin::room_add');
    $routes->post('room_save', 'Admin::room_save');
    $routes->get('edit_room/(:num)', 'Admin::edit_room/$1');
    $routes->post('update_room/(:num)', 'Admin::update_room/$1');
    $routes->get('delete_room/(:num)', 'Admin::delete_room/$1');
    // sub admin
    $routes->get('login', 'Admin::login');
    $routes->get('logout', 'Admin::logout');
    $routes->post('user_login', 'Admin::sub_admin_login');
    $routes->get('sub_admin', 'Admin::sub_admin');
    $routes->get('sub_admin_add', 'Admin::sub_admin_add');
    $routes->post('sub_admin_save', 'Admin::sub_admin_save');
    $routes->get('edit_sub_admin/(:num)', 'Admin::edit_sub_admin/$1');
    $routes->post('update_sub_admin/(:num)', 'Admin::update_sub_admin/$1');
    $routes->get('delete_sub_admin/(:num)', 'Admin::delete_sub_admin/$1');

    $routes->get('subadmin_approved/(:num)', 'Admin::subadmin_approved/$1');
    $routes->get('admin_approved/(:num)', 'Admin::admin_approved/$1');

});