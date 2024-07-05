<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MembersModel;

class PasswordHashController extends Controller
{
    public function hashExistingPasswords()
    {
        $model = new MembersModel();
        $members = $model->findAll();
        
        foreach ($members as $member) {
            if (!password_get_info($member['password'])['algo']) {
                // Password is not hashed
                $hashedPassword = password_hash($member['password'], PASSWORD_DEFAULT);
                $model->update($member['id'], [
                    'password' => $hashedPassword,
                    'updated_at' => date('Y-m-d H:i:s') // Update the timestamp
                ]);
            }
        }
        
        return 'Passwords hashed successfully.';
    }
}
