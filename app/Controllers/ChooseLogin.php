<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ChooseLogin extends Controller
{
    public function index()
    {
        return view('ChooseLogin/index');
    }

    public function adminLogin()
    {
        return redirect()->to('/admin/login');
    }

    public function memberLogin()
    {
        return redirect()->to('/member/login');
    }
}
