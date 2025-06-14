<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'name',
        'email',
        'phone_number',
        'password',
        'is_verified',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'name' => 'required|min_length[2]',
        'email'     => 'required|valid_email|is_unique[users.email]',
        'phone_number'     => 'required|regex_match[/^[0-9]{10}$/]|is_unique[users.phone_number]',
        'password'  => 'required|min_length[6]',
        'role'      => 'in_list[parent,clinic]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email already registered.',
        ],
        'phone' => [
            'is_unique' => 'Phone number already used.',
        ]
    ];

    protected $skipValidation = false;
}
