<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    protected $table = 'reports'; // Name of the table
    protected $primaryKey = 'id'; // Primary key of the table

    protected $allowedFields = ['bookname', 'username', 'rating', 'feedback']; // Columns you can insert or update
}
