<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('toko')->insert([
            'id_toko' => 1,
            'nama_toko' => 'Arga Dwi Mart', 
            'alamat_toko' => 'Jalan Pemuda',
            'tlp' => '0895337303020',
            'nama_pemilik' => 'Wirahadi Kusuma',
            'id_member' => 1,
        ]);
    }
}
