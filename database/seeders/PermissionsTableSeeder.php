<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_access',
            ],
            [
                'id'    => 2,
                'title' => 'applicant_access',
            ],
            [
                'id'    => 3,
                'title' => 'dfo_access',
            ],
            [
                'id'    => 4,
                'title' => 'kppm_access',
            ],
            [
                'id'    => 5,
                'title' => 'fo_access',
            ],
            [
                'id'    => 6,
                'title' => 'viewer_access',
            ],
            [
                'id'    => 7,
                'title' => 'permit_access',
            ],
            [
                'id'    => 8,
                'title' => 'report_access',
            ],
            [
                'id'    => 9,
                'title' => 'settings_access',
            ],
            [
                'id'    => 10,
                'title' => 'ppw_access',
            ],
            [
                'id'    => 11,
                'title' => 'tppw_access',
            ],
            [
                'id'    => 12,
                'title' => 'adfo_access',
            ],
            [
                'id'    => 13,
                'title' => 'hammer_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
