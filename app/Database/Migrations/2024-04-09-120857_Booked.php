<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 9,
                'auto_increment' => true,
            ],
            
            'room_id' => [
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 9,
                
               
            ],
            'subadmin_approved' => [
                'type' => 'INT',
                'constraint' => 9,
                'default' => false,
               
            ],
            'admin_approved' => [
                'type' => 'INT',
                'constraint' => 9,
                'default' => false,
               
            ],
            'total_amount' => [
                'type' => 'DECIMAL(10,2)',
                'default' => 0.00,
            ],
            'order_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'payment_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'payment_status' => [
                'type' => 'ENUM("Pending", "Confirmed", "Failed")',
                'default' => 'Pending',
            ],
            'booking_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'arrival_date' => [
                'type' => 'DATE',
            ],
            'departure_date' => [
                'type' => 'DATE',
            ],
            'emp_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'department' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'dob' => [
                'type' => 'DATE',
            ],
            'gender' => [
                'type' => 'ENUM("Male","Female","Other")',
            ],
            'official_address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pin' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'id_proof' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
      //  $this->forge->addForeignKey('room_id', 'rooms', 'id'); 
        $this->forge->createTable('booked');
    }

    public function down()
    {
        $this->forge->dropTable('booked');
    }
}
