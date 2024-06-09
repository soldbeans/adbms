<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("Home/index");
    }
    public function addBook(): string 
    {
        return view("addBook/index");
    }
}
