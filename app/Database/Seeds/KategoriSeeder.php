<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori'   => 1,
                'nama_kategori' => 'Pulpen',
                'tgl_input'     => '7 May 2017, 10:23',
            ],
            [
                'id_kategori'   => 8,
                'nama_kategori' => 'Buku',
                'tgl_input'     => '5 November 2020, 9:20',
            ],
            [
                'id_kategori'   => 9,
                'nama_kategori' => 'Kertas',
                'tgl_input'     => '5 November 2020, 9:20',
            ],
            [
                'id_kategori'   => 10,
                'nama_kategori' => 'Pensil',
                'tgl_input'     => '5 November 2020, 9:20',
            ],
            [
                'id_kategori'   => 11,
                'nama_kategori' => 'Makanan',
                'tgl_input'     => '2 December 2024, 21:25',
            ],
            [
                'id_kategori'   => 12,
                'nama_kategori' => 'Minuman',
                'tgl_input'     => '2 December 2024, 21:28',
            ],
            [
                'id_kategori'   => 13,
                'nama_kategori' => 'Minyak Goreng',
                'tgl_input'     => '2 December 2024, 21:44',
            ],
            [
                'id_kategori'   => 14,
                'nama_kategori' => 'Sabun Mandi',
                'tgl_input'     => '2 December 2024, 21:52',
            ],
            [
                'id_kategori'   => 15,
                'nama_kategori' => 'Rokok',
                'tgl_input'     => '2 December 2024, 21:53',
            ],
            [
                'id_kategori'   => 16,
                'nama_kategori' => 'Skincare',
                'tgl_input'     => '2 December 2024, 22:07',
            ],
            [
                'id_kategori'   => 17,
                'nama_kategori' => 'Deterjen',
                'tgl_input'     => '2 December 2024, 22:26',
            ],
            [
                'id_kategori'   => 18,
                'nama_kategori' => 'Pewangi',
                'tgl_input'     => '2 December 2024, 22:54',
            ],
        ];

        // Insert data ke tabel kategori
        $this->db->table('kategori')->insertBatch($data);
    }
}
