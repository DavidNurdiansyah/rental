<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password')); // Menggunakan MD5 hash untuk password
        $user = $model->getUser($username);

        if ($user) {
            if ($password === $user['password']) {
                $session->set('isLoggedIn', true);
                return redirect()->to('/beranda');
            } else {
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
