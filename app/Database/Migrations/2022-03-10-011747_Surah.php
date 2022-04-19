<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Surah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'surah_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_surah'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'surah_ke'       => [
                'type'          => 'INT',
                'constraint'    => '10',
            ],
            'tgl_ujian'          => [
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
            'penguji_id'       => [
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
        $this->forge->addKey('surah_id', true);
        // add foreign key
        $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        $this->forge->addForeignKey('penguji_id', 'penguji', 'penguji_id');
        $this->forge->createTable('surah');
    }

    public function down()
    {
        $this->forge->dropForeignKey('surah', 'surah_penguji_id_foreign');
        $this->forge->dropForeignKey('surah', 'surah_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('surah');
    }
}
