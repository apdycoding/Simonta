<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kepsek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kepsek_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik_kepsek'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'name_kepsek'       => [
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
            'status_kepsek'     => [
                'type'          => 'ENUM',
                'constraint'    => ['actived', 'nonActived'],
                'default'       => 'actived'
            ],
            'gelar'       => [
                'type'          => 'ENUM',
                'constraint'    => ['D3', 'S1'],
                'default'       => 'S1'
            ],
            'lulusan'           => [
                'type'          => 'VARCHAR',
                'constraint'    => '100'
            ],
            'phone_kepsek'           => [
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
        $this->forge->addKey('kepsek_id', true);
        // membuat table santri
        $this->forge->createTable('kepsek');
    }

    public function down()
    {
        // menghapus table
        $this->forge->dropTable('kepsek');
    }
}
