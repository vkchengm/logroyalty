<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sandakan',
                'region_id' => 1,
                'dfo_id' => 6,
                'adfo_id' => 7,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:28:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Telupid',
                'region_id' => 1,
                'dfo_id' => 11,
                'adfo_id' => 12,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:29:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Deramakot',
                'region_id' => 1,
                'dfo_id' => 15,
                'adfo_id' => 16,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:30:39',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Beluran',
                'region_id' => 1,
                'dfo_id' => 19,
                'adfo_id' => 20,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:32:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tongod',
                'region_id' => 1,
                'dfo_id' => 24,
                'adfo_id' => 25,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:33:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kinabatangan',
                'region_id' => 1,
                'dfo_id' => 29,
                'adfo_id' => 30,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:35:09',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Kota Kinabalu',
                'region_id' => 2,
                'dfo_id' => 38,
                'adfo_id' => 39,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:36:54',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ranau',
                'region_id' => 2,
                'dfo_id' => 42,
                'adfo_id' => 43,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:38:03',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Sipitang',
                'region_id' => 2,
                'dfo_id' => 46,
                'adfo_id' => 47,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:38:43',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Beaufort',
                'region_id' => 2,
                'dfo_id' => 49,
                'adfo_id' => 50,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 19:39:10',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Keningau',
                'region_id' => 3,
                'dfo_id' => 56,
                'adfo_id' => 57,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:46:17',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Tibow',
                'region_id' => 3,
                'dfo_id' => 60,
                'adfo_id' => 61,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:42:10',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Nabawan',
                'region_id' => 3,
                'dfo_id' => 64,
                'adfo_id' => 65,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:43:17',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Sook',
                'region_id' => 3,
                'dfo_id' => 69,
                'adfo_id' => 70,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:44:19',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Tenom',
                'region_id' => 3,
                'dfo_id' => 74,
                'adfo_id' => 75,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:45:11',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Tambunan',
                'region_id' => 3,
                'dfo_id' => 78,
                'adfo_id' => 79,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:46:59',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Kudat',
                'region_id' => 4,
                'dfo_id' => 85,
                'adfo_id' => 86,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:40:00',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Kota Belud',
                'region_id' => 4,
                'dfo_id' => 90,
                'adfo_id' => 91,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:37:54',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Kota Marudu',
                'region_id' => 4,
                'dfo_id' => 93,
                'adfo_id' => 94,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:38:57',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Pitas',
                'region_id' => 4,
                'dfo_id' => 97,
                'adfo_id' => 98,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:41:01',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Tawau',
                'region_id' => 5,
                'dfo_id' => 106,
                'adfo_id' => 107,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:50:27',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Kalabakan',
                'region_id' => 5,
                'dfo_id' => 110,
                'adfo_id' => 111,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:48:27',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Serudong',
                'region_id' => 5,
                'dfo_id' => 116,
                'adfo_id' => 117,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:49:40',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Kunak',
                'region_id' => 5,
                'dfo_id' => 120,
                'adfo_id' => 121,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:51:31',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Semporna',
                'region_id' => 5,
                'dfo_id' => 125,
                'adfo_id' => 126,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:52:24',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Lahad Datu',
                'region_id' => 5,
                'dfo_id' => 129,
                'adfo_id' => 130,
                'created_at' => NULL,
                'updated_at' => '2022-05-22 20:53:10',
            ),
        ));
        
        
    }
}