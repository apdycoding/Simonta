<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createuser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nameUser'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'emailUser'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'phoneUser'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'password'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'roleUser'     => [
                'type'          => 'ENUM',
                'constraint'    => ['adminsuper', 'staff', 'kepsek', 'walisantri'],
                'default'       => 'walisantri'
            ],
            'isactive'     => [
                'type'          => 'ENUM',
                'constraint'    => ['0', '1'],
                'default'       => '0',
            ],
            'photos'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '70',
                'null'           => true
            ],
            'created_at'            => [
                'type'           => 'DATETIME',
                'null'           => true
            ],

            'updated_at'            => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('user_id', true);
        // membuat table santri
        $this->forge->createTable('users');
    }

    public function down()
    {
        // menghapus table
        $this->forge->dropTable('users');
    }
}
