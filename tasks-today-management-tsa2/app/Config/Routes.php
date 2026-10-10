<?php

namespace Config;

$routes = Services::routes();

$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->post('logout', 'Auth::logout');
$routes->get('tasks/new', 'Tasks::new');
$routes->post('tasks', 'Tasks::create');
$routes->get('tasks/(:num)/edit', 'Tasks::edit/$1');
$routes->post('tasks/(:num)', 'Tasks::update/$1');
$routes->post('tasks/(:num)/archive', 'Tasks::archive/$1');
