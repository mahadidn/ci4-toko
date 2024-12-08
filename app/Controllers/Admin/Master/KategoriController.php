<?php

namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;

class KategoriController extends BaseController
{
    public function index()
    {
        // Data dummy kategori
        $data['hasil'] = [
            [
                'id_kategori' => 1,
                'nama_kategori' => 'Elektronik',
                'tgl_input' => '2024-01-01',
            ],
            [
                'id_kategori' => 2,
                'nama_kategori' => 'Furnitur',
                'tgl_input' => '2024-02-15',
            ],
            [
                'id_kategori' => 3,
                'nama_kategori' => 'Pakaian',
                'tgl_input' => '2024-03-10',
            ],
        ];

        return view('admin/master/kategori/index', $data);
    }
    
    public function edit($id)
    {
        // Data dummy untuk edit kategori
        $data['edit'] = [
            'id_kategori' => $id,
            'nama_kategori' => 'Elektronik',
        ];

        return view('admin/master/kategori/edit', $data);
    }
}
