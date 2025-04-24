<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Tampilkan form register
    public function register()
    {
        return view('auth/register');
    }

    // Proses data register
    public function registerSave()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Simpan user ke database
        $userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login');
    }

    // Tampilkan form login
    public function login()
    {
        return view('auth/login');
    }

    // Proses login
    public function loginAuth()
    {
        $userModel = new UserModel();
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set('isLoggedIn', true);
                $session->set('username', $user['username']);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
