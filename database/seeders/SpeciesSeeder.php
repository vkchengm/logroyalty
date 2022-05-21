<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        $species = [

            // Natural Log
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Natural',
            ],


            // Plantation Log
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Plantation',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Plantation',
            ],

            //Converted Timber
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Converted Timber',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Converted Timber',
            ],


            // Fuel Wood
            [
                'id'    => $id++,
                'name' => 'Fuel Wood',
                'type' => 'Natural',
            ],


            // Pulp and paper logs
            [
                'id'    => $id++,
                'name' => 'Log for Pulp and Paper',
                'type' => 'Natural',
            ],
            [
                'id'    => $id++,
                'name' => 'Log for Pulp and Paper',
                'type' => 'Plantation',
            ],

        ];

        Species::insert($species);
    }
        
    
}
