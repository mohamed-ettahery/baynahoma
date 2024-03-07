<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'firstName' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'lastName' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'userName' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.jpg'
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',

            ],
            'birthday' => [
                'type'       => 'DATE',
                'default' => null,
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default' => null,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default' => null,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default' => null,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'about' => [
                'type' => 'TEXT',
            ],
            'is_admin' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('userName');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
