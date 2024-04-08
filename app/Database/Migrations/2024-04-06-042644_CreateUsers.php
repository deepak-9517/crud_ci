<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'dob' => [
                'type' => 'date',
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
