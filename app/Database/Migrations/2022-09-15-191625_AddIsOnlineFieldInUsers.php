<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsOnlineFieldInUsers extends Migration
{
    public function up()
    {
        $field = [
            'is_online' => [
                'type'           => 'BOOLEAN',
                'DEFAULT'           => false,
            ]
        ];
        $this->forge->addColumn("users",$field);
    }

    public function down()
    {
        $this->forge->dropColumn("users","is_online");
    }
}
