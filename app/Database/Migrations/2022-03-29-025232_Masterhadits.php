<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masterhadits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Mhadits_id'          => [
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
            'dhadits_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'htgl_ujian'          => [
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
        $this->forge->addKey('Mhadits_id', true);
        $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        $this->forge->addForeignKey('penguji_id', 'penguji', 'penguji_id');
        $this->forge->addForeignKey('dhadits_id', 'dhadits', 'dhadits_id');

        // membuat table santri
        $this->forge->createTable('mhadits');
    }

    public function down()
    {
        $this->forge->dropForeignKey('mhadits', 'mhadits_penguji_id_foreign');
        $this->forge->dropForeignKey('mhadits', 'mhadits_dhadits_id_foreign');
        $this->forge->dropForeignKey('mhadits', 'mhadits_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('mhadits');
    }
}
