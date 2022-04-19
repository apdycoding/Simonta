<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PengujiModel;

class Penguji extends Seeder
{
    public function run()
    {
        $user_object = new PengujiModel();

        $data = [
            [
                'nama_penguji'  => 'Ust. Muhammad Bahri, S.Pd.I',
                'jk'            => 'L',
            ],
            [
                'nama_penguji'  => 'Ust. Rizki Utama',
                'jk'            => 'L',
            ],
        ];

        $user_object->insertBatch($data);
    }
}
