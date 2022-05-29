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
            // Sandakan
            [
                'id'    => 1,
                'name' => 'Sandakan',
                'region_id' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Telupid',
                'region_id' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Deramakot',
                'region_id' => 1,
            ],
            [
                'id'    => 4,
                'name' => 'Beluran',
                'region_id' => 1,
            ],
            [
                'id'    => 5,
                'name' => 'Tongod',
                'region_id' => 1,
            ],
            [
                'id'    => 6,
                'name' => 'Kinabatangan',
                'region_id' => 1,
            ],

            // Kota Kinabalu
            [
                'id'    => 7,
                'name' => 'Kota kinabalu',
                'region_id' => 2,
            ],
            [
                'id'    => 8,
                'name' => 'Ranau',
                'region_id' => 2,
            ],
            [
                'id'    => 9,
                'name' => 'Sipitang',
                'region_id' => 2,
            ],
            [
                'id'    => 10,
                'name' => 'Beaufort',
                'region_id' => 2,
            ],

            // Keningau
            [
                'id'    => 11,
                'name' => 'Keningau',
                'region_id' => 3,
            ],
            [
                'id'    => 12,
                'name' => 'Tibow',
                'region_id' => 3,
            ],
            [
                'id'    => 13,
                'name' => 'Nabawan',
                'region_id' => 3,
            ],
            [
                'id'    => 14,
                'name' => 'Sook',
                'region_id' => 3,
            ],
            [
                'id'    => 15,
                'name' => 'Tenom',
                'region_id' => 3,
            ],
            [
                'id'    => 16,
                'name' => 'Tambunan',
                'region_id' => 3,
            ],

            // Kudat
            [
                'id'    => 17,
                'name' => 'Kudat',
                'region_id' => 4,
            ],
            [
                'id'    => 18,
                'name' => 'Kota Belud',
                'region_id' => 4,
            ],
            [
                'id'    => 19,
                'name' => 'Kota Marudu',
                'region_id' => 4,
            ],
            [
                'id'    => 20,
                'name' => 'Pitas',
                'region_id' => 4,
            ],

            // Tawau
            [
                'id'    => 21,
                'name' => 'Tawau',
                'region_id' => 5,
            ],
            [
                'id'    => 22,
                'name' => 'Kalabakan',
                'region_id' => 5,
            ],
            [
                'id'    => 23,
                'name' => 'Serudong',
                'region_id' => 5,
            ],
            [
                'id'    => 24,
                'name' => 'Kunak',
                'region_id' => 5,
            ],
            [
                'id'    => 25,
                'name' => 'Semporna',
                'region_id' => 5,
            ],
            [
                'id'    => 26,
                'name' => 'Lahad Datu',
                'region_id' => 5,
            ],

        ];

        District::insert($districts);
    }
}
