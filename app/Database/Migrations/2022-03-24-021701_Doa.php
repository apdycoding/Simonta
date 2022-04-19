<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Doa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'doa_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tglLulus'          => [
                'type'           => 'DATE',
            ],
            'predikat'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'santri_id'       => [
                'type'          => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            // 'penguji_id'       => [
            //     'type'          => 'BIGINT',
            //     'constraint'     => 20,
            //     'unsigned'       => true,
            // ],
            'created_at'            => [
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
        $this->forge->addKey('doa_id', true);
        // add foreign key
        $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        // $this->forge->addForeignKey('penguji_id', 'penguji', 'penguji_id');
        $this->forge->createTable('doa');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('doa', 'doa_penguji_id_foreign');
        $this->forge->dropForeignKey('doa', 'doa_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('doa');
    }
}
