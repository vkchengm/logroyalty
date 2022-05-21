<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Applicant',
            ],
            [
                'id'    => 3,
                'title' => 'DFO',
            ],
            [
                'id'    => 4,
                'title' => 'KPPM',
            ],
            [
                'id'    => 5,
                'title' => 'FO',
            ],
            [
                'id'    => 6,
                'title' => 'Viewer',
            ],
            [
                'id'    => 7,
                'title' => 'PPW',
            ],
            [
                'id'    => 8,
                'title' => 'TPPW',
            ],
            [
                'id'    => 9,
                'title' => 'ADFO',
            ],

        ];

        Role::insert($roles);
    }
}
