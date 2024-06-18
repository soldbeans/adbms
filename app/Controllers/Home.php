<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MembersModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view ('navbar') . view("Home/index");
    }

    public function Home(): string
    {
        return view ('navbar') . view("Home/index");
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
    
    public function Checkouts(): string
    {
        return view('navbar') . view("Checkouts/index");
    }

    public function Members()
    {
        helper(['form']);
        
        $membersModel = new MembersModel();
        $data['members'] = $membersModel->findAll();
    
        echo view('navbar');
        echo view('Members/index', $data);
    }

    public function Reports(): string
    {
        return view('navbar') . view("Reports/index");
    }
    public function addBook(): string
    {
        helper(['form']);
        return view ('navbar') . view("addBook/index");
    }

    public function saveBook()
    {
        helper(['form']);
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'book_title' => 'required|min_length[3]|max_length[128]',
            'author' => 'required|min_length[3]|max_length[128]',
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
            'details' => $this->request->getPost('details'),
            'availability' => $this->request->getPost('availability'),
        ];
    
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageData = file_get_contents($file->getTempName());
            $data['image'] = $imageData;
        }
    
        if ($model->insert($data)) {
            return redirect()->to('/Catalog');
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
            'details' => 'required|max_length[256]',
            'availability' => 'required|in_list[Available,Unavailable]',
            'image' => 'max_size[image,4096]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
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
            'details' => $this->request->getPost('details'),
            'availability' => $this->request->getPost('availability'),
        ];
    
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageData = file_get_contents($file->getTempName());
            $data['image'] = $imageData;
        }
    
        if ($model->update($bookId, $data)) {
            $responseData = [
                'status' => 'success',
                'image' => !empty($data['image']) ? 'data:image/jpeg;base64,' . base64_encode($data['image']) : ''
            ];
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
                return $this->response->setJSON(['status' => 'success']);
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
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email|max_length[100]',
            'phone_number' => 'required|min_length[10]|max_length[15]'
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return view('navbar') . view('Members/index', [
                'validation' => $validation,
                'members' => (new MembersModel())->findAll()
            ]);
        }
    
        $model = new MembersModel();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];
    
        if ($model->insert($data)) {
            return redirect()->to('/Members');
        } else {
            echo "<script>alert('Member was not added.');</script>";
            return view('navbar') . view('Members/index', [
                'validation' => $validation,
                'members' => $model->findAll()
            ]);
        }
    }
}
