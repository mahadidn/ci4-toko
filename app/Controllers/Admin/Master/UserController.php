<?php

namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        // Dummy Data
        $data = [
            'id_member' => 1,
            'nm_member' => 'John Doe',
            'email' => 'john.doe@example.com',
            'telepon' => '08123456789',
            'NIK' => '1234567890123456',
            'alamat_member' => 'Jl. Kebon Jeruk No. 10',
            'gambar' => 'default.jpg',
            'user' => 'john_doe'
        ];

        return view('admin/master/user/index', ['data' => $data]);
    }
}
