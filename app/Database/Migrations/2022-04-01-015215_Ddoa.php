<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ddoa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ddoa_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_doa'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
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
        $this->forge->addKey('ddoa_id', true);
        // $this->forge->addForeignKey('santri_id', 'santri', 'santri_id');
        // membuat table santri
        $this->forge->createTable('ddoa');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('mhadits', 'mhadits_santri_id_foreign');
        // menghapus table
        $this->forge->dropTable('ddoa');
    }
}
