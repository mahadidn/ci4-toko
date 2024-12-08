<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Member extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nm_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'alamat_member' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'gambar' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'NIK' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id_member', true);
        $this->forge->createTable('member');
    }

    public function down()
    {
        // akan dijalankan hapus tabel saat jalankan perintah php spark migrate:rollback
        $this->forge->dropTable('member');
    }
}
