<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Santri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'santri_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik_santri'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'name_santri'       => [
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
            'statusSantri'     => [
                'type'          => 'ENUM',
                'constraint'    => ['0', '1'],
                'default'       => 'actived'
            ],
            'photos'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '70',
                'null'           => true
            ],
            'nik_ibu'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'nama_ibu'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'pekerjaan_ibu'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'status_ibu'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'phoneIbu'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],
            'nik_ayah'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'nama_ayah'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'pekerjaan_ayah'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'status_ayah'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'phoneAyah'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],

            // 'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',

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
        $this->forge->addKey('santri_id', true);
        // membuat table santri
        $this->forge->createTable('santri');
    }

    public function down()
    {
        // menghapus table
        $this->forge->dropTable('santri');
    }
}
