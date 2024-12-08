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
            'pass' => '21232f297a57a5a743894a0e4a801fc3', // passwordnya: admin jadi kek gitu karna sudah di hash pake md5
            'id_member' => 1
        ]);

        
    }
}
