<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = "books";
    protected $primaryKey = "book_id";
    protected $allowedFields=["book_title", "author", "details", "availability", "image"];
}