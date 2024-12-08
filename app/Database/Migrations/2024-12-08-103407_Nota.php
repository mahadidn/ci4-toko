<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_nota' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
                'null'       => false,
            ],
            'id_member' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'total' => [
                'type'       => 'DOUBLE',
                'null'       => false,
            ],
            'tanggal_input' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_nota', true);
        $this->forge->addKey('id_member');
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nota');
    }

    public function down()
    {
        $this->forge->dropTable('nota');
    }
}
