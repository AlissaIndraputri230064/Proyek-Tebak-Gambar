<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('home_admin', 'AdminController::homeAdmin');
    $routes->get('tambah_soal', 'GameController::tambahSoal');
    $routes->get('tambah_gambar', 'ImageController::tambahGambar');
    $routes->post('store', 'ImageController::store');
});
$routes->get('page/home', 'Page::home');    
$routes->post('page/home', 'Page::home');
//$routes->get('page/profile/(:num)', 'UserController::profile/$1');
$routes->get('page/edit_profile', 'Page::editProfile');
$routes->post('page/edit_profile', 'Page::editProfile');
$routes->get('page/record', 'Page::record');
$routes->get('page/profile', 'Page::profile');
$routes->post('page/record', 'Page::record');
//$routes->get('record', 'GameController::play/$1');
$routes->get('auth/register', 'AuthController::registerUser');
$routes->post('auth/registerUser', 'AuthController::registerUser');
$routes->get('auth/login', 'AuthController::loginUser');
$routes->post('auth/loginUser', 'AuthController::loginUser');
$routes->get('auth/logout', 'AuthController::logout');
$routes->post('auth/logout', 'AuthController::logout');
$routes->get('deleteAccount', 'UserController::deleteAccount');
$routes->get('game/play/(:num)', 'GameController::play/$1');
$routes->post('game/play/(:num)', 'GameController::play/$1');
$routes->post('game/check/(:num)', 'GameController::checkAnswer/$1');
$routes->get('game/bermain_level', 'GameController::levels'); 
$routes->match(['get', 'post'], 'game/play/(:num)', 'GameController::play/$1');
$routes->get('game/benar/(:num)', 'GameController::correct/$1');
$routes->get('game/salah/(:num)', 'GameController::wrong/$1');
$routes->get('showEdit_profile', 'UserController::showEditProfile');
$routes->post('page/editProfile', 'UserController::editProfile');




