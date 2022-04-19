<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teacher extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'teacher_id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik_teacher'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'name'       => [
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
            ],
            'foto'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '70',
                'null'           => true
            ],
            'telp'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
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
        $this->forge->addKey('teacher_id', true);
        // membuat table santri
        $this->forge->createTable('teacher');
    }

    public function down()
    {
        // menghapus table
        $this->forge->dropTable('teacher');
    }
}
