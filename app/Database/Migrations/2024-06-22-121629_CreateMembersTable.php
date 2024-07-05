<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMembersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
                'null' => false,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['no violations', 'penalized', 'banned'],
                'default' => 'no violations',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        // Set the id field as the primary key
        $this->forge->addKey('id', true);
        // Create the table
        $this->forge->createTable('members');

        // Insert a default member record with a hashed password for testing purposes
        $hashedPassword = password_hash('password123', PASSWORD_BCRYPT);

        $data = [
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'john.doe@example.com',
            'phone_number'=> '1234567890',
            'password'   => $hashedPassword,
            'status'     => 'no violations',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('members')->insert($data);
    }

    public function down()
    {
        // Drop the table if it exists
        $this->forge->dropTable('members');
    }
}
