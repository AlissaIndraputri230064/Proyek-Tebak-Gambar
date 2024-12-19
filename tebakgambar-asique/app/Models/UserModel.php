<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_email', 'user_name','user_password', 'role'];

    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data) 
    {
        if(isset($data['data']['password'])) 
        {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }

        return $data;
    }
}