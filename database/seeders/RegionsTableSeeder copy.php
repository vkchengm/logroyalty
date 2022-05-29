<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            [
                'id'    => 1,
                'name' => 'Sandakan',
                // 'fo_id' => 17,
            ],
            [
                'id'    => 2,
                'name' => 'Kota Kinabalu',
                // 'fo_id' => 5,
            ],
            [
                'id'    => 3,
                'name' => 'Keningau',
                // 'fo_id' => 18,
            ],
            [
                'id'    => 4,
                'name' => 'Kudat',
                // 'fo_id' => 12,
            ],
            [
                'id'    => 5,
                'name' => 'Tawau',
                // 'fo_id' => 16,
            ],
        ];

        Region::insert($regions);
    }
}
