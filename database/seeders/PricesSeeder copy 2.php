<?php

namespace Database\Seeders;

use App\Models\Prices;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [

            [
                'id'    => 1,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 1,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 350,
            ],
            [
                'id'    => 2,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'RIL',
                'species_id' => 1,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 350,
            ],
            [
                'id'    => 3,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'Helicopter',
                'species_id' => 1,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 350,
            ],
            [
                'id'    => 4,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 1,
                'land_type_id' => 3,
                'log_size_id' => 1,
                'price' => 350,
            ],
            [
                'id'    => 5,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 1,
                'land_type_id' => 4,
                'log_size_id' => 1,
                'price' => 350,
            ],
            [
                'id'    => 6,
                'class' => 'A',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 1,
                'land_type_id' => 5,
                'log_size_id' => 1,
                'price' => 350,
            ],

            [
                'id'    => 7,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 300,
            ],
            [
                'id'    => 8,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'RIL',
                'species_id' => 2,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 290,
            ],
            [
                'id'    => 9,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Helicopter',
                'species_id' => 2,
                'land_type_id' => 2,
                'log_size_id' => 1,
                'price' => 150,
            ],


            [
                'id'    => 10,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 3,
                'log_size_id' => 5,
                'price' => 300,
            ],
            [
                'id'    => 11,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 3,
                'log_size_id' => 4,
                'price' => 250,
            ],
            [
                'id'    => 12,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 3,
                'log_size_id' => 3,
                'price' => 200,
            ],
            [
                'id'    => 13,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 3,
                'log_size_id' => 2,
                'price' => 150,
            ],

            [
                'id'    => 14,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 5,
                'log_size_id' => 5,
                'price' => 300,
            ],
            [
                'id'    => 15,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 5,
                'log_size_id' => 4,
                'price' => 250,
            ],
            [
                'id'    => 16,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 5,
                'log_size_id' => 3,
                'price' => 200,
            ],
            [
                'id'    => 17,
                'class' => 'B',
                'market' => 'Export',
                'method' => 'Non-RIL',
                'species_id' => 2,
                'land_type_id' => 5,
                'log_size_id' => 2,
                'price' => 150,
            ],


        ];

        Prices::insert($prices);    }
}
