<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MembersModel;
use App\Models\FeedbackModel;

class MemberController extends Controller
{
    public function loginView()
    {
        return view('MemberLogin/index');
    }

    public function home(): string
    {
        return view('Mnavbar') . view('MHome/index');
    }
    
    public function catalog(): string
    {
        return view('Mnavbar') . view('MCatalog/index');
    }
    
    public function checkouts(): string
    {
        return view('Mnavbar') . view('MCheckouts/index');
    }
    
    public function feedback(): string
    {
        $model = new FeedbackModel();
        $data['feedbacks'] = $model->findAll(); // Fetch all feedbacks from the reports table
        return view('feedback/index', $data);
    }
    
    public function profile(): string
    {
        return view('Mnavbar') . view('MProfile/index');
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
    
        $model = new MembersModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        if (!is_string($password)) {
            return redirect()->back()->with('error', 'Password should be a string.');
        }
    
        $member = $model->where('email', $email)->first();
    
        if ($member && password_verify($password, $member['password'])) {
            session()->set('member_email', $member['email']);
            return redirect()->to('/member/MHome');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function index()
    {
        $model = new FeedbackModel();
        $data['feedbacks'] = $model->findAll(); // Fetch all feedbacks
        return view('feedback/index', $data);
    }

    public function add()
    {
        $model = new FeedbackModel();

        // Validate form input (optional)
        $validation = \Config\Services::validation();
        $validation->setRules([
            'bookname' => 'required',
            'username' => 'required',
            'rating' => 'required|integer|greater_than[0]|less_than[6]', // assuming rating is between 1 to 5
            'feedback' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, redirect back to the form with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Prepare data to insert into the database
        $data = [
            'bookname' => $this->request->getPost('bookname'),
            'username' => $this->request->getPost('username'),
            'rating' => $this->request->getPost('rating'),
            'feedback' => $this->request->getPost('feedback'),
        ];

        // Insert data into the database
        $model->insert($data);

        // Redirect back to the feedback page after insertion
        return redirect()->to('/member/feedback');
    }
}
