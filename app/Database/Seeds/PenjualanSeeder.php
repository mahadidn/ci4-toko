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
    }
}
