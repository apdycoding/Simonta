<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hadits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'hadits_id'          => [
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
        $this->forge->addKey('hadits_id', true);
        // add foreign key
        $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        // $this->forge->addForeignKey('penguji_id', 'penguji', 'penguji_id');
        $this->forge->createTable('hadits');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('hadits', 'hadits_penguji_id_foreign');
        $this->forge->dropForeignKey('hadits', 'hadits_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('hadits');
    }
}
