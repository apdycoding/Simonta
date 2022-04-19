<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Staff extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'staff_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik_staff'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'name_staff'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'gender'             => [
                'type'           => 'ENUM',
                'constraint'     => ['man', 'woman'],
            ],
            'agama'             => [
                'type'           => 'ENUM',
                'constraint'     => ['islam', 'kristen', 'katolik', 'hindu', 'budha'],
                'default'        => 'islam',
            ],
            'alamat'             => [
                'type'           => 'TEXT',
            ],
            'tgl_lahir'          => [
                'type'           => 'DATE',
            ],
            'tempat_lhr'         => [
                'type'           => 'TEXT',
                // 'constraint'     => '100',
            ],
            'phone_staff'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],

            'created_at'         => [
                'type'           => 'DATETIME',
                'null'           => true
            ],

            'updated_at'            => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'deleted_at'            => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('staff_id', true);
        // membuat table santri
        $this->forge->createTable('staff');
    }

    public function down()
    {
        // menghapus table
        $this->forge->dropTable('staff');
    }
}
