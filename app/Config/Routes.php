<?php

$routes->get('/register', 'Auth::register');
$routes->post('/registerSave', 'Auth::registerSave');

$routes->get('/login', 'Auth::login');
$routes->post('/loginAuth', 'Auth::loginAuth');

$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');
    return "Selamat datang di Dashboard!";


