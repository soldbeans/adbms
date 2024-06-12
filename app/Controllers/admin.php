<?php

namespace App\Controllers;

class admin extends BaseController
{
    public function index(): string
    {
        return view("Home/index");
    }

    public function addBook(): string
    {
        return view("addBook/index");
    }

    public function Home(): string
    {
        return view("Home/index");
    }
}
