<?php

namespace App\Controllers;

class admin extends BaseController
{
    public function index(): string
    {
        return view("Home/index");
    }
}
