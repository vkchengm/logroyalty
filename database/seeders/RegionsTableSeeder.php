<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regions')->delete();
        
        \DB::table('regions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sandakan',
                'fo_id' => 34,
                'ppw_id' => 2,
                'tppw_id' => 3,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:11:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kota Kinabalu',
                'fo_id' => 37,
                'ppw_id' => 35,
                'tppw_id' => 36,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:12:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Keningau',
                'fo_id' => 55,
                'ppw_id' => 51,
                'tppw_id' => 52,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:13:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kudat',
                'fo_id' => 84,
                'ppw_id' => 81,
                'tppw_id' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:16:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tawau',
                'fo_id' => 105,
                'ppw_id' => 101,
                'tppw_id' => 102,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 21:00:29',
            ),
        ));
        
        
    }
}