<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Ganti 'dashboard' ke 'auth/home'
        return view('auth/home');
    }
}
