<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subadmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'admin' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'subadmin' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'user' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('allusers');
    }

    public function down()
    {
        $this->forge->dropTable('subadmin');
    }
}
