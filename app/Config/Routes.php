<?php

$routes->get('/register', 'Auth::register');
$routes->post('/registerSave', 'Auth::registerSave');

$routes->get('/login', 'Auth::login');
$routes->post('/loginAuth', 'Auth::loginAuth');

$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index'); // ✅ Tidak perlu ada return di sini

// Student Routes
$routes->get('/list-student', 'StudentController::index');
$routes->get('/student/download-report', 'StudentController::downloadExcelReport');
$routes->get('/student/generate-pdf', 'StudentController::generatePdf');


