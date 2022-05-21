<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                'id'    => 1,
                'name' => 'Kudat',
                'region_id' => 1,
                'dfo_id' => 3,
            ],
            [
                'id'    => 2,
                'name' => 'Kota Kinabalu',
                'region_id' => 2,
                'dfo_id' => 9,
            ],
            [
                'id'    => 3,
                'name' => 'Keningau',
                'region_id' => 3,
                'dfo_id' => 11,
            ],
            [
                'id'    => 4,
                'name' => 'Sandakan',
                'region_id' => 4,
                'dfo_id' => 7,
            ],
            [
                'id'    => 5,
                'name' => 'Tawau',
                'region_id' => 5,
                'dfo_id' => 8,
            ],

            [
                'id'    => 6,
                'name' => 'Kudat 2',
                'region_id' => 1,
                'dfo_id' => 3,
            ],
            [
                'id'    => 7,
                'name' => 'Kota Kinabalu 2',
                'region_id' => 2,
                'dfo_id' => 9,
            ],
            [
                'id'    => 8,
                'name' => 'Keningau 2',
                'region_id' => 3,
                'dfo_id' => 11,
            ],
            [
                'id'    => 9,
                'name' => 'Sandakan 2',
                'region_id' => 4,
                'dfo_id' => 7,
            ],
            [
                'id'    => 10,
                'name' => 'Tawau 2',
                'region_id' => 5,
                'dfo_id' => 8,
            ],

            [
                'id'    => 11,
                'name' => 'Kudat 3',
                'region_id' => 1,
                'dfo_id' => 3,
            ],
            [
                'id'    => 12,
                'name' => 'Kota Kinabalu 3',
                'region_id' => 2,
                'dfo_id' => 9,
            ],
            [
                'id'    => 13,
                'name' => 'Keningau 3',
                'region_id' => 3,
                'dfo_id' => 11,
            ],
            [
                'id'    => 14,
                'name' => 'Sandakan 3',
                'region_id' => 4,
                'dfo_id' => 7,
            ],
            [
                'id'    => 15,
                'name' => 'Tawau 3',
                'region_id' => 5,
                'dfo_id' => 8,
            ],


        ];

        District::insert($districts);
    }
}
