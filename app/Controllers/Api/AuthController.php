<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        helper(['form', 'url']);

        $rules = [
            'name'        => 'required|min_length[2]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'phone_number'            => 'required|regex_match[/^[0-9]{10}$/]|is_unique[users.phone_number]',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 400,
                'message' => 'Validation failed',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $userModel = new UserModel();

        $data = [
            'name' => $this->request->getVar('name'),
            'email'     => $this->request->getVar('email'),
            'phone_number'     => $this->request->getVar('phone_number'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'      => 'parent',
            'is_verified' => 0
        ];

        $userModel->save($data);

        return $this->response->setJSON([
            'status' => 201,
            'message' => 'User registered successfully'
        ]);
    }
}
