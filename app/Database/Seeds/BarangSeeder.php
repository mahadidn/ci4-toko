<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_barang'     => 'BR001',
                'id_kategori'   => 1,
                'nama_barang'   => 'Pulpen Hitam',
                'merk'          => 'Standard AE7',
                'harga_beli'    => '3000',
                'harga_jual'    => '4000',
                'satuan_barang' => 'PCS',
                'stok'          => '15',
                'tgl_input'     => '5 November 2020, 9:24',
                'tgl_update'    => '2 December 2024, 21:41',
                'id_member'     => 1,
            ],
            [
                'id_barang'     => 'BR002',
                'id_kategori'   => 8,
                'nama_barang'   => 'Buku Tulis',
                'merk'          => 'Kiky',
                'harga_beli'    => '1160',
                'harga_jual'    => '2000',
                'satuan_barang' => 'PCS',
                'stok'          => '23',
                'tgl_input'     => '5 November 2020, 9:31',
                'tgl_update'    => '5 November 2020, 9:42',
                'id_member'     => 1,
            ],
            [
                'id_barang'     => 'BR003',
                'id_kategori'   => 9,
                'nama_barang'   => 'HVS A4 100 gsm (100 lembar)',
                'merk'          => 'Paperone',
                'harga_beli'    => '16750',
                'harga_jual'    => '18000',
                'satuan_barang' => 'Pack',
                'stok'          => '12',
                'tgl_input'     => '5 November 2020, 9:35',
                'tgl_update'    => null,
                'id_member'     => 1,
            ],
        ];

        $this->db->table('barang')->insertBatch($data);
    }
}