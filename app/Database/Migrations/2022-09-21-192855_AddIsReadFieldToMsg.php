<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsReadFieldToMsg extends Migration
{
    public function up()
    {
        $field = [
            'is_read' => [
                'type'           => 'BOOLEAN',
                'DEFAULT'           => false,
            ]
        ];
        $this->forge->addColumn("messages",$field);
    }

    public function down()
    {
        $this->forge->dropColumn("messages","is_read");
    }
}
