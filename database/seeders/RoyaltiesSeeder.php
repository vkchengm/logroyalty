<?php

namespace Database\Seeders;

use App\Models\Royalties;
use Illuminate\Database\Seeder;

class RoyaltiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=1;


        // Export Market
        $species =  [1];  // A Belian
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 400, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 400, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 400, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 400, ];
        }

        $species =  [2,3];  // B Merbau & Merbau Lalat
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 330, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 330, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 330, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 330, ];
        }
                    
        $species =  [4,5,6];  // C Selangan Batu, Pelawan-Pelawan, Kayu Malam
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'C', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 240, ];

            $landTypes = [3,4,5];
            foreach ($landTypes as $landType) {
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'C', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 5, 'amount' => 240, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'C', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 4, 'amount' => 204, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'C', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 3, 'amount' => 168, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'C', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 2, 'amount' => 96, ];
            }
        }

        $species =  [7,8,9];  // D
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 200, ];

            $landTypes = [3,4,5];
            foreach ($landTypes as $landType) {
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 5, 'amount' => 200, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 4, 'amount' => 170, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 3, 'amount' => 140, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 2, 'amount' => 80, ];
            }
        }

        $species =  [10,11,12,13,14,15,16,17,18];  // E
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 180, ];

            $landTypes = [3,4,5];
            foreach ($landTypes as $landType) {
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 5, 'amount' => 180, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 4, 'amount' => 153, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 3, 'amount' => 126, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 2, 'amount' => 72, ];
            }
        }

        $species =  [19];  // F Others
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 150, ];

            $landTypes = [3,4,5];
            foreach ($landTypes as $landType) {
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 5, 'amount' => 150, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 4, 'amount' => 128, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 3, 'amount' => 105, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 2, 'amount' => 60, ];
            }
        }

        $species =  [20];  // G Macaranga
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 20, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 20, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 20, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 20, ];
        }

        $species =  [22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44];  // H Planted
        foreach ($species as $specie) {
            // $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 30, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 30, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 30, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 30, ];
        }

        // Local Processing
        $species =  [1,2,3];  // Belian, Merbau, Merbau Lalat
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 120, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 120, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 120, ];
        }

        $species =  [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];  // C Selangan Batu, Pelawan-Pelawan, Kayu Malam.....
        foreach ($species as $specie) {
            $landTypes = [2,3,4,5];
            foreach ($landTypes as $landType) {
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 5, 'amount' => 95, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 4, 'amount' => 80, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 3, 'amount' => 45, ];
                $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                    'species_id' => $specie, 'land_type_id' => $landType, 'log_size_id' => 2, 'amount' => 35, ];
            }
        }


        $species =  [20,21];  // Macaranga, Fuel Wood
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 5, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 5, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 5, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 5, ];
        }

        $species =  [22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44];  // Planted
        foreach ($species as $specie) {
            // $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 30, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 15, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 0, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 15, ];
        }

        $species =  [45,46,47];  // Converted Belian, Merbau, Merbau Lalat
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 240, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 240, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 240, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 240, ];
        }

        $species =  [48,49,50,51,52,53,54,55,56,57,58,59,60,61,62];  // Converted others...
        foreach ($species as $specie) {
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 190, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 190, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 190, ];
            $royalties[] = [ 'id'    =>  $id++, 'class' => 'LP', 'market' => 'Local Processing', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 190, ];
        }

        // $royalties = [
        //     // Belian Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 1, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 1, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 1, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 1, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 120, ],

        //     // Merbau Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 2, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 2, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 2, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 2, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 120, ],

        //     // Perupok Export
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'RIL',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Helicopter',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 120, ],
        //     [ 'id'    =>  $id++, 'class' => 'F', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 120, ],

        //     // Perupok Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 85, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'RIL',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 75, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Helicopter',
        //         'species_id' => 17, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 0, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 85, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 85, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 17, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 85, ],

        //     // Macaranga Export
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 20, ],
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'RIL',
        //         'species_id' => 18, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 20, ],
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Helicopter',
        //         'species_id' => 18, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 10, ],
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 20, ],
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 20, ],
        //     [ 'id'    =>  $id++, 'class' => 'G', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 20, ],

        //     // Macaranga Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 18, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 5, ],

        //     // Fuel Wood Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 58, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 58, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 58, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 58, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 5, ],

        //     // Natural Log for Pulp and Paper Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 59, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 7.5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 59, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 7.5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 59, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 7.5, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 59, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 7.5, ],

        //     // Plantation Log for Pulp and Paper Local Processing
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 60, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 6, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 60, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 6, ],
        //     // [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //     //     'species_id' => 60, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 6, ],
        //     [ 'id'    =>  $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => 60, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 6, ],
        // ];



        // Red Seraya to Pengiran Export
        // $species =  [5,6,7,8,9,10,11,12,13,14,15,16];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 160, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 150, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Helicopter',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 80, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 160, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 130, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 110, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 60, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 160, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 130, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 110, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 60, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 160, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 130, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 110, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'D', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 60, ];
        // }

        // // Others Export
        // $species =  [19];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 125, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 115, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Helicopter',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 63, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 125, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 100, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 50, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 125, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 100, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 50, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 125, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 100, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'E', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 50, ];
        // }

        // Plantation Logs Export
        // $species =  [20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 60, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 48, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 36, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 24, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 0, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 60, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 48, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 36, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'H', 'market' => 'Export', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 24, ];
        // }

        // // Natural Local Processing
        // $species =  [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 80, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Helicopter',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 45, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 75, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 40, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 30, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 75, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 40, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 30, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 90, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 75, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 40, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 30, ];
        // }


        // // Plantation Logs Local Processing
        // $species =  [20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 30, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 24, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 18, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 12, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 0, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 0, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 30, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 24, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 18, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 12, ];
        // }

        // // Converted Timber Local Processing 40-57
        // $species =  [40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57];
        // foreach ($species as $specie) {
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 180, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 180, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Helicopter',
        //         'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 90, ];

        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 180, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 180, ];
        //     $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Non-RIL',
        //         'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 180, ];
        // }

        // // Converted Timber Belian Local Processing Helicopter 
        // $royalties[] = [ 'id'    => $id++, 'class' => 'P', 'market' => 'Local Processing', 'method' => 'Helicopter',
        // 'species_id' => 39, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 200, ];


        Royalties::insert($royalties);    }
}
