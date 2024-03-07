<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'msg' => [
                'type'       => 'TEXT',
            ],
            'msgFrom' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'msgTo' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('msgFrom', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('msgTo', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('messages');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('messages');
    }
}
