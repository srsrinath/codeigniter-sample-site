<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('about','Home::about');
$routes->get('contact','Home::contact');
$routes->get('gallery','Home::gallery');



//Auth routes
$routes->get('register','Authentication::register');
$routes->post('register','Authentication::register');
$routes->get('login','Authentication::login');
$routes->post('login','Authentication::login');
$routes->get('dashboard','Authentication::dashboard');
$routes->get('logout','Authentication::logout');



//after login
$routes->get('upload','UploadController::upload');
$routes->post('upload','UploadController::upload');
$routes->get('post','BlogController::post');
$routes->post('post','BlogController::post');
$routes->get('blogs','BlogController::blogs');
$routes->get('edit/(:num)','BlogController::edit/$1');
$routes->post('update/(:num)','BlogController::update/$1');
$routes->get('delete/(:num)','BlogController::delete/$1');

//$routes->get('delete','BlogController::delete');




















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
