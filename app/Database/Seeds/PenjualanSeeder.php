<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('penjualan')->insert([
            'id_penjualan' => 1,
            'id_barang' => 'BR002', 
            'id_member' => 1,
            'jumlah' => '1',
            'total' => 2000,
        ]);

        $this->db->table('penjualan')->insert([
            'id_penjualan' => 2,
            'id_barang' => 'BR005', 
            'id_member' => 1,
            'jumlah' => '2',
            'total' => 436000,
        ]);
    }
}
