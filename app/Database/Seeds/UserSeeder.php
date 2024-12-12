<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // tambah data member dan login
        // member
        $this->db->table('member')->insert([
            'nm_member' => 'Admin Iyan',
            'alamat_member' => 'JL. Pasar Besar',
            'telepon' => '083125525004',
            'email' => 'iyanzeldiyan@gmail.com',
            'gambar' => 'WhatsApp Image 2024-12-02 at 9.04.51 PM.jpeg',
            'NIK' => '2201020121'
        ]);

        // login
        $this->db->table('login')->insert([
            'user' => 'admin',
            'pass' => password_hash('admin', PASSWORD_BCRYPT), 
            'id_member' => 1
        ]);

        
    }
}
