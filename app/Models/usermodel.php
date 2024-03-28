<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password'];

    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }

}