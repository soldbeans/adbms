<?php

namespace App\Controllers;

use App\Models\BookModel;

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

    public function Catalog(): string
    {
        $model = new BookModel;

        $data['books'] = $model ->findAll();
        
        return view('navbar') . view("Catalog/index", $data);
    }

    public function Checkouts(): string
    {
        return view('navbar') . view("Checkouts/index");
    }

    public function Members(): string
    {
        return view('navbar') . view("Members/index");
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
        $validation = \Config\Services::validation();
    
        // Set validation rules
        $validation->setRules([
            'book_title' => 'required|min_length[3]|max_length[128]',
            'author' => 'required|min_length[3]|max_length[128]',
            'details' => 'required|max_length[256]',
            'availability' => 'required|in_list[Available,Unavailable]',
        ]);
    
        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, return to the add book form with errors
            return view('addBook/index', [
                'validation' => $validation,
            ]);
        }
    
        // If validation passes, proceed to save the book
        $model = new BookModel();
    
        $data = [
            'book_title' => $this->request->getPost('book_title'),
            'author' => $this->request->getPost('author'),
            'details' => $this->request->getPost('details'),
            'availability' => $this->request->getPost('availability'),
        ];
    
        // Insert data into the database using BookModel
        $model->insert($data);
    
        // Redirect to the Catalog page after successful insertion
        return redirect()->to('/Catalog');
    }      
}
