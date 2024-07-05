<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'phone_number', 'password', 'status'];
    protected $useTimestamps = true; // Enable automatic timestamps
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat    = 'datetime';

    protected function hashPassword($data)
    {
        if (isset($data['data']['password']) && is_string($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
}
