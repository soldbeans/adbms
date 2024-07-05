<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MemberController extends Controller
{
    public function loginView()
    {
        return view('MemberLogin/index');
    }

    public function home(): string
    {
        return view('Unavbar') . view('MHome/index');
    }
    
    public function catalog(): string
    {
        return view('Unavbar') . view('MCatalog/index');
    }
    
    public function checkouts(): string
    {
        return view('Unavbar') . view('MCheckouts/index');
    }
    
    public function reports(): string
    {
        return view('Unavbar') . view('MReports/index');
    }
    
    public function profile(): string
    {
        return view('Unavbar') . view('MProfile/index');
    }    

    public function login()
    {
        helper(['form']);
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email|min_length[3]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[255]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return view('MemberLogin/index', [
                'validation' => $validation,
            ]);
        }
    
        $model = new \App\Models\MembersModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        if (!is_string($password)) {
            return redirect()->back()->with('error', 'Password should be a string.');
        }
    
        $member = $model->where('email', $email)->first();
    
        if ($member && password_verify($password, $member['password'])) {
            session()->set('member_email', $member['email']);
            return redirect()->to('/member/home');
        }     else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}