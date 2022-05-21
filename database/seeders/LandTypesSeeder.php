<?php

namespace Database\Seeders;

use App\Models\LandTypes;
use Illuminate\Database\Seeder;

class LandTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $landtypes = [
            // [
            //     'id'    => 1,
            //     'name' => 'FR',
            //     'description' => 'Forest Reserve',
            // ],
            [
                'id'    => 2,
                'name' => 'NFM',
                'description' => 'Natural Forest Management',
            ],
            [
                'id'    => 3,
                'name' => 'ITP',
                'description' => 'Industrial Tree Plantation',
            ],
            [
                'id'    => 4,
                'name' => 'AL',
                'description' => 'Alienated Land',
            ],
            [
                'id'    => 5,
                'name' => 'SL',
                'description' => 'State Land',
            ],
            // [
            //     'id'    => 6,
            //     'name' => 'BW',
            //     'description' => 'Benta Wawasan',
            // ],
            // [
            //     'id'    => 7,
            //     'name' => 'YS',
            //     'description' => 'Yayasan Sabah',
            // ],
        ];

        LandTypes::insert($landtypes);
        
    }
}
