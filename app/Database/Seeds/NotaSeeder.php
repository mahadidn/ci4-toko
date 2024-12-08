<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_nota'       => 'TAA2020-11-050001',
                'id_member'     => 1,
                'total'         => 4000,
                'tanggal_input' => '5 November 2020',
                'periode'       => '11-2020',
            ],
            [
                'id_nota'       => 'TAA2020-11-050002',
                'id_member'     => 1,
                'total'         => 4000,
                'tanggal_input' => '5 November 2020',
                'periode'       => '11-2020',
            ],
            [
                'id_nota'       => 'TAA2024-08-270001',
                'id_member'     => 1,
                'total'         => 6000,
                'tanggal_input' => '27 August 2024',
                'periode'       => '08-2024',
            ],
        ];

        // Insert data ke tabel nota
        $this->db->table('nota')->insertBatch($data);

        // detail nota
        $data = [
            [
                'id'        => 1,
                'id_barang' => 'BR001',
                'id_nota'   => 'TAA2020-11-050001',
                'jumlah'    => 1,
                'total'     => 4000,
            ],
            [
                'id'        => 2,
                'id_barang' => 'BR001',
                'id_nota'   => 'TAA2020-11-050002',
                'jumlah'    => 1,
                'total'     => 4000,
            ],
            [
                'id'        => 3,
                'id_barang' => 'BR001',
                'id_nota'   => 'TAA2024-08-270001',
                'jumlah'    => 1,
                'total'     => 4000,
            ],
            [
                'id'        => 4,
                'id_barang' => 'BR002',
                'id_nota'   => 'TAA2024-08-270001',
                'jumlah'    => 1,
                'total'     => 2000,
            ],
        ];

        // Insert data ke tabel detail_nota
        $this->db->table('detail_nota')->insertBatch($data);
    }
}
