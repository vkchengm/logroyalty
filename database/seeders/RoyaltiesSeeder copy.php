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
        // $royalties[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
        $royalties = [
            // Belian
            [ 'id'    =>  1, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => 1, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 350, ],
            [ 'id'    =>  2, 'class' => 'A', 'market' => 'Export', 'method' => 'RIL',
                'species_id' => 1, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 350, ],
            [ 'id'    =>  3, 'class' => 'A', 'market' => 'Export', 'method' => 'Helicopter',
                'species_id' => 1, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 350, ],
            [ 'id'    =>  4, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => 1, 'land_type_id' => 3, 'log_size_id' => 1, 'amount' => 350, ],
            [ 'id'    =>  5, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => 1, 'land_type_id' => 4, 'log_size_id' => 1, 'amount' => 350, ],
            [ 'id'    =>  6, 'class' => 'A', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => 1, 'land_type_id' => 5, 'log_size_id' => 1, 'amount' => 350, ],
        ];

        // Merbau and Merbau Lalat
        $id=7;

        $species =  [2,3];
        // for ($item=0; $item < count($species); $item++) {
            // dd('testing');
            foreach ($species as $specie) {

            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 300, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'RIL',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 290, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Helicopter',
                'species_id' => $specie, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 150, ];

            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 300, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 250, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 200, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 150, ];

            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 300, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 250, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 200, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 150, ];

            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 300, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 250, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 200, ];
            $royalties[] = [ 'id'    => $id++, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
                'species_id' => $specie, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 150, ];
            }

        // }         

            // [ 'id'    =>  7, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 300, ],
            // [ 'id'    =>  8, 'class' => 'B', 'market' => 'Export', 'method' => 'RIL',
            //     'species_id' => 2, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 290, ],
            // [ 'id'    => 9, 'class' => 'B', 'market' => 'Export', 'method' => 'Helicopter',
            //     'species_id' => 2, 'land_type_id' => 2, 'log_size_id' => 1, 'amount' => 150, ],

            // [ 'id'    => 10, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 3, 'log_size_id' => 5, 'amount' => 300, ],
            // [ 'id'    => 11, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 3, 'log_size_id' => 4, 'amount' => 250, ],
            // [ 'id'    => 12, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 3, 'log_size_id' => 3, 'amount' => 200, ],
            // [ 'id'    => 13, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 3, 'log_size_id' => 2, 'amount' => 150, ],

            // [ 'id'    => 14, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 4, 'log_size_id' => 5, 'amount' => 300, ],
            // [ 'id'    => 15, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 4, 'log_size_id' => 4, 'amount' => 250, ],
            // [ 'id'    => 16, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 4, 'log_size_id' => 3, 'amount' => 200, ],
            // [ 'id'    => 17, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 4, 'log_size_id' => 2, 'amount' => 150, ],

            // [ 'id'    => 18, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 5, 'log_size_id' => 5, 'amount' => 300, ],
            // [ 'id'    => 19, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 5, 'log_size_id' => 4, 'amount' => 250, ],
            // [ 'id'    => 20, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 5, 'log_size_id' => 3, 'amount' => 200, ],
            // [ 'id'    => 21, 'class' => 'B', 'market' => 'Export', 'method' => 'Non-RIL',
            //     'species_id' => 2, 'land_type_id' => 5, 'log_size_id' => 2, 'amount' => 150, ],




        // ];

        Royalties::insert($royalties);    }
}
