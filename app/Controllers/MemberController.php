<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MemberController extends Controller
{
    public function index(): string
    {
        return view('Unavbar') . view('UHome');
    }

    public function home(): string
    {
        return view('Unavbar') . view('UHome');
    }

    public function catalog(): string
    {
        return view('Unavbar') . view('UCatalog');
    }

    public function checkouts(): string
    {
        return view('Unavbar') . view('UCheckout');
    }

    public function reports(): string
    {
        return view('Unavbar') . view('UReport');
    }

    public function profile(): string
    {
        return view('Unavbar') . view('UProfile');
    }

    public function login()
    {
        helper(['form']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('MemberLogin/index', [
                'validation' => $validation,
            ]);
        }

        $model = new \App\Models\MembersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!is_string($password)) {
            return redirect()->back()->with('error', 'Password should be a string.');
        }

        $member = $model->where('username', $username)->first();

        if ($member && password_verify($password, $member['password'])) {
            // Set session data or perform any post-login actions
            session()->set('member_username', $member['username']);
            return redirect()->to('/member/home');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
