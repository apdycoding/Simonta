<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\TeacherModel;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $objectTeacher = new TeacherModel();

        $data = [
            [
                'nik_teacher'   => '18131413124312',
                'name'          => 'coba 1',
                'gender'        => 'man',
                'agama'         => 'islam',
                'alamat'        => 'pagar alam utara',
                'tgl_lahir'     => '1999-12-12',
                'tempat_lhr'    => 'pagar alam',
                'foto'          => 'default.png',
                'telp'          => '081312124312',
            ],
            [
                'nik_teacher'   => '18145413124312',
                'name'          => 'coba 2',
                'gender'        => 'woman',
                'agama'         => 'islam',
                'alamat'        => 'pagar alam selatan',
                'tgl_lahir'     => '1999-02-01',
                'tempat_lhr'    => 'pagar alam',
                'foto'          => 'default.png',
                'telp'          => '082313224312',
            ],
            [
                'nik_teacher'   => '18131413124312',
                'name'          => 'coba 3',
                'gender'        => 'man',
                'agama'         => 'islam',
                'alamat'        => 'jarai',
                'tgl_lahir'     => '2000-12-12',
                'tempat_lhr'    => 'pagar alam',
                'foto'          => 'default.png',
                'telp'          => '081312124312',
            ],
            [
                'nik_teacher'   => '18131413124312',
                'name'          => 'coba 4',
                'gender'        => 'woman',
                'agama'         => 'islam',
                'alamat'        => 'lahat',
                'tgl_lahir'     => '1999-12-12',
                'tempat_lhr'    => 'palembang',
                'foto'          => 'default.png',
                'telp'          => '081312124312',
            ],
        ];

        $objectTeacher->insertBatch($data);
    }
}
