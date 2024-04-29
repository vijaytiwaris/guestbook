<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 9,
                'auto_increment' => true
            ],
            'room_title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'room_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'room_size' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'max_guest' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'des' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'booking_amount' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' =>  date('Y-m-d H:i:s') // Set default value to CURRENT_TIMESTAMP
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('rooms', true);
    }

    public function down()
    {
        $this->forge->dropTable('rooms', true);
    }
}
