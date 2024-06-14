<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'book_id' => [
                'type'              => 'INT',
                'null'              => false,
                'auto_increment'    => true
            ],
            'book_title' => [
                'type'              =>'VARCHAR',
                'null'              => false,
                'constraint'        => 128,
            ],
            'author' => [
                'type'              =>'VARCHAR',
                'null'              => false,
                'constraint'        => 128,
            ],
            'details' => [
                'type'              =>'TEXT',
                'null'              => false,
                'constraint'        => 256,
            ],
            'availability' => [
                'type'              =>'ENUM',
                'null'              => false,
                'constraint'        => ['Available', 'Unavailable'],
            ],
        ]);

        $this->forge->addPrimaryKey('book_id');

        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
