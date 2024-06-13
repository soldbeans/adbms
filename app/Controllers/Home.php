<?php

namespace App\Controllers;

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
        return view('navbar') . view("Catalog/index");
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
        return view ('navbar') . view("addBook/index");
    }
}
