<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MembersModel;
use App\Models\AdminLoginModel;
use App\Models\ReportsModel;

class AdminController extends BaseController
{
    // Existing methods that do not need changes

    public function index(): string
    {
        return view('navbar') . view("Home/index");
    }

    public function catalog()
    {
        $model = new BookModel();
        $books = $model->findAll();

        // Encode image data in base64
        foreach ($books as &$book) {
            if (!empty($book['image'])) {
                $book['image'] = base64_encode($book['image']);
            }
        }

        $data['books'] = $books;

        echo view('navbar');
        echo view('catalog/index', $data);
    }

    public function checkouts(): string
    {
        return view('navbar') . view("Checkouts/index");
    }

    public function members()
    {
        helper(['form']);

        $membersModel = new MembersModel();
        $data['members'] = $membersModel->findAll();

        echo view('navbar');
        echo view('Members/index', $data);
    }

    public function feedback(): string
    {
        return view('navbar') . view("feedback/index");
    }

    public function addBook(): string
    {
        helper(['form']);
        return view('navbar') . view("addBook/index");
    }

    public function saveBook()
    {
        helper(['form']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'book_title' => 'required|min_length[3]|max_length[128]',
            'author' => 'required|min_length[3]|max_length[128]',
            'genre' => 'required|in_list[Action,Comedy,Fantasy,Romance,Horror,Educational,Thriller,Mystery,Others]',
            'details' => 'required|max_length[256]',
            'availability' => 'required|in_list[Available,Unavailable]',
            'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('navbar') . view('addBook/index', [
                'validation' => $validation,
            ]);
        }

        $model = new BookModel();
        $data = [
            'book_title' => $this->request->getPost('book_title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'details' => $this->request->getPost('details'),
            'availability' => $this->request->getPost('availability'),
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageData = file_get_contents($file->getTempName());
            $data['image'] = $imageData;
        }

        if ($model->insert($data)) {
            return redirect()->to('admin/Catalog');
        } else {
            echo "<script>alert('Book was not added.');</script>";
            return view('navbar') . view('addBook/index');
        }
    }

    public function updateBook()
    {
        helper(['form']);
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'book_id' => 'required',
            'book_title' => 'required|min_length[3]|max_length[128]',
            'author' => 'required|min_length[3]|max_length[128]',
            'genre' => 'required|in_list[Action,Comedy,Fantasy,Romance,Horror,Educational,Thriller,Mystery,Others]',
            'details' => 'required|max_length[256]',
            'availability' => 'required|in_list[Available,Unavailable]',
            'image' => 'max_size[image,4096]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'message' => $validation->getErrors()]);
        }
    
        $bookId = $this->request->getPost('book_id');
        $model = new BookModel();
        $book = $model->find($bookId);
    
        if (!$book) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Book not found.']);
        }
    
        $data = [
            'book_title' => $this->request->getPost('book_title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'details' => $this->request->getPost('details'),
            'availability' => $this->request->getPost('availability'),
        ];
    
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $data['image'] = $file->getName(); // Store image filename
        }
    
        if ($model->update($bookId, $data)) {
            $responseData = ['status' => 'success', 'message' => 'Book updated successfully.'];
        } else {
            $responseData = ['status' => 'error', 'message' => 'Failed to update book.'];
        }
    
        return $this->response->setJSON($responseData);
    }
    
    public function deleteBook()
    {
        $bookId = $this->request->getPost('book_id');
    
        if ($bookId) {
            $model = new BookModel();
            if ($model->delete($bookId)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Book deleted successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete book.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid book ID.']);
        }
    }
       
    public function addMember()
    {
        helper(['form']);
        
        $validation = \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]|is_unique[members.email]',
            'phone_number' => 'required|max_length[15]',
            'password' => 'required|min_length[8]|max_length[255]',
            'status' => 'required|in_list[no violations,penalized,banned]',
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return view('admin/members', [
                'validation' => $validation,
            ]);
        }
        
        $model = new MembersModel();
        
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'password' => $this->request->getPost('password'), // Password will be hashed in the model
            'status' => $this->request->getPost('status'),
        ];
        
        if ($model->save($data)) {
            return redirect()->to('/admin/Members')->with('success', 'Member added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add member');
        }
    }
    
    public function getMemberDetails()
    {
        $memberId = $this->request->getPost('member_id');
        
        if (!$memberId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid member ID.']);
        }
    
        $membersModel = new MembersModel();
        $member = $membersModel->find($memberId);
    
        if (!$member) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Member not found.']);
        }
    
        return $this->response->setJSON(['status' => 'success', 'member' => $member]);
    }                  

    public function updateMember()
    {
        helper(['form']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'member_id' => 'required|is_natural_no_zero',
            'first_name' => 'required|min_length[2]|max_length[100]',
            'last_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone_number' => 'required|max_length[15]',
            'password' => 'permit_empty|min_length[8]|max_length[255]',
            'status' => 'required|in_list[no violations,penalized,banned]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        }

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'status' => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $password = $this->request->getPost('password');

        if (!empty($password) && is_string($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        }

        $model = new MembersModel();
        $memberId = $this->request->getPost('member_id');

        if ($model->update($memberId, $data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update member.']);
        }
    }

    public function deleteMember()
    {
        $memberId = $this->request->getPost('member_id');

        if ($memberId) {
            $model = new MembersModel();
            if ($model->delete($memberId)) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete member.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid member ID.']);
        }
    }    

    // New methods or modified methods
    public function loginView(): string
    {
        helper(['form']);
        return view('AdminLogin/index');
    }
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
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
            return view('AdminLogin/index', [
                'validation' => $validation,
            ]);
        }

        $model = new AdminLoginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!is_string($password)) {
            return redirect()->back()->with('error', 'Password should be a string.');
        }

        $admin = $model->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Set session data or perform any post-login actions
            $this->session->set('username', $admin['username']);
            return redirect()->to('/admin/Home');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function add()
    {
        $model = new ReportsModel();
        $data = [
            'bookname' => $this->request->getPost('bookname'),
            'username' => $this->request->getPost('username'),
            'rating' => $this->request->getPost('rating'),
            'feedback' => $this->request->getPost('feedback'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $model->insert($data);
        return redirect()->to('/feedback');
    }
}
