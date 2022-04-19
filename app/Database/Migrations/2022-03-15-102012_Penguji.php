<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penguji extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'penguji_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_penguji'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'jk'     => [
                'type'          => 'ENUM',
                'constraint'    => ['L', 'P'],
                // 'default'       => '0',
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
        $this->forge->addKey('penguji_id', true);
        // add foreign key
        // $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        $this->forge->createTable('penguji');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('surah', 'surah_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('penguji');
    }
}
