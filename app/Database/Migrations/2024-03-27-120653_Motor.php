<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Motor extends Migration {

    public function up()
    {
        $this->forge->addField([
            'id_motor' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_plat' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'nama_motor' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'harga' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'BLOB',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_motor', true);
        $this->forge->createTable('motor');
    }

    public function down()
    {
        $this->forge->dropTable('motor');
    }
}
