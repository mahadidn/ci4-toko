<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailNota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'id_nota' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
                'null'       => false,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'total' => [
                'type'       => 'DOUBLE',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('id_barang');
        $this->forge->addKey('id_nota');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_nota', 'nota', 'id_nota', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_nota');
    }

    public function down()
    {
        $this->forge->dropTable('detail_nota');
    }
}
