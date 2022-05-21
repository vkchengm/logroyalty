<?php

namespace Database\Seeders;

use App\Models\LogSize;
use Illuminate\Database\Seeder;

class LogSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logsizes = [

            [
                'id'    => 1,
                'name' => 'All Sizes',
                'fr_size' => '0',
                'to_size' => '300',
                'unit' => 'CM',
            ],
            [
                'id'    => 2,
                'name' => 'Below 30cm',
                'fr_size' => '0',
                'to_size' => '30',
                'unit' => 'CM',
            ],
            [
                'id'    => 3,
                'name' => 'Between 30cm to 45cm',
                'fr_size' => '30',
                'to_size' => '45',
                'unit' => 'CM',
            ],
            [
                'id'    => 4,
                'name' => 'Between 45cm to 60cm',
                'fr_size' => '45',
                'to_size' => '60',
                'unit' => 'CM',
            ],
            [
                'id'    => 5,
                'name' => 'Above 60cm',
                'fr_size' => '60',
                'to_size' => '300',
                'unit' => 'CM',
            ],
        ];

        LogSize::insert($logsizes);

    }
}
