<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminLoginModel extends Model
{
    protected $table = 'admin'; // Adjust this to your actual table name
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password']; // Adjust as needed

    public function findAdminByUsername($username)
    {
        return $this->where('username', $username)->first(); // Adjust field name if needed
    }
}
