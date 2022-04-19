<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masterdoa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mdoa_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'santri_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'ddoa_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'dtgl_ujian'          => [
                'type'           => 'DATE',
            ],
            'predikat'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'penguji_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
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
        $this->forge->addKey('mdoa_id', true);
        $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        $this->forge->addForeignKey('penguji_id', 'penguji', 'penguji_id');
        $this->forge->addForeignKey('ddoa_id', 'ddoa', 'ddoa_id');

        // membuat table santri
        $this->forge->createTable('mdoa');
    }

    public function down()
    {
        $this->forge->dropForeignKey('mdoa', 'mdoa_penguji_id_foreign');
        $this->forge->dropForeignKey('mdoa', 'mdoa_santri_id_foreign');
        $this->forge->dropForeignKey('mdoa', 'mdoa_ddoa_id_foreign');
        // menghapus table
        $this->forge->dropTable('mdoa');
    }
}
