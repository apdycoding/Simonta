<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $data = [
            [
                'nameUser'      => 'Agus Priyadi',
                'emailUser'     => 'apdy0997@gmail.com',
                'phoneUser'     => '085357092487',
                'password'      => password_hash('12345', PASSWORD_BCRYPT),
                'roleUser'      => '1',
                'roleUser'      => 'adminSuper',
                'photos'        => 'default.png',
            ],
            [
                'nameUser'      => 'Apdy',
                'emailUser'     => 'apdy1997@gmail.com',
                'phoneUser'     => '082351292487',
                'password'      => password_hash('12345', PASSWORD_BCRYPT),
                'roleUser'      => '1',
                'roleUser'      => 'staff',
                'photos'        => 'default.png',
            ],
            [
                'nameUser'      => 'user',
                'emailUser'     => 'apdy997@gmail.com',
                'phoneUser'     => '0813131292487',
                'password'      => password_hash('12345', PASSWORD_BCRYPT),
                'roleUser'      => '1',
                'roleUser'      => 'walisantri',
                'photos'        => 'default.png',
            ],
        ];

        $user_object->insertBatch($data);
    }
}
