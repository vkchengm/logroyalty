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
                'import_code' => 'NBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Natural',
                'import_code' => 'NMB',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Natural',
                'import_code' => 'NMBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Natural',
                'import_code' => 'NSB',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Natural',
                'import_code' => 'NRS',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Natural',
                'import_code' => 'NWS',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Natural',
                'import_code' => 'NYS',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Natural',
                'import_code' => 'NMLP',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Natural',
                'import_code' => 'NKP',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Natural',
                'import_code' => 'NKR',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Natural',
                'import_code' => 'NAG',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Natural',
                'import_code' => 'NKB',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Natural',
                'import_code' => 'NKS',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Natural',
                'import_code' => 'NNY',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Natural',
                'import_code' => 'NOS',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Natural',
                'import_code' => 'NPG',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Natural',
                'import_code' => 'NPR',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Natural',
                'import_code' => 'NMC',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Natural',
                'import_code' => 'NOT',
            ],


            // Plantation Log
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Plantation',
                'import_code' => 'PBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Plantation',
                'import_code' => 'PMB',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Plantation',
                'import_code' => 'PMBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Plantation',
                'import_code' => 'PSB',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Plantation',
                'import_code' => 'PRS',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Plantation',
                'import_code' => 'PWS',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Plantation',
                'import_code' => 'PYS',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Plantation',
                'import_code' => 'PMLP',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Plantation',
                'import_code' => 'PKP',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Plantation',
                'import_code' => 'PKR',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Plantation',
                'import_code' => 'PAG',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Plantation',
                'import_code' => 'PKB',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Plantation',
                'import_code' => 'PKS',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Plantation',
                'import_code' => 'PNY',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Plantation',
                'import_code' => 'POS',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Plantation',
                'import_code' => 'PPG',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Plantation',
                'import_code' => 'PPR',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Plantation',
                'import_code' => 'PMC',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Plantation',
                'import_code' => 'POT',                
            ],

            //Converted Timber
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Converted Timber',
                'import_code' => 'CBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Converted Timber',
                'import_code' => 'CMB',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Converted Timber',
                'import_code' => 'CMBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Converted Timber',
                'import_code' => 'CSB',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Converted Timber',
                'import_code' => 'CRS',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Converted Timber',
                'import_code' => 'CWS',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Converted Timber',
                'import_code' => 'CYS',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Converted Timber',
                'import_code' => 'CMLP',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Converted Timber',
                'import_code' => 'CKP',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Converted Timber',
                'import_code' => 'CKR',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Converted Timber',
                'import_code' => 'CAG',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Converted Timber',
                'import_code' => 'CKB',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Converted Timber',
                'import_code' => 'CKS',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Converted Timber',
                'import_code' => 'CNY',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Converted Timber',
                'import_code' => 'COS',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Converted Timber',
                'import_code' => 'CPG',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Converted Timber',
                'import_code' => 'CPR',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Converted Timber',
                'import_code' => 'CMC',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Converted Timber',
                'import_code' => 'COT',            
            ],


            // Fuel Wood
            [
                'id'    => $id++,
                'name' => 'Fuel Wood',
                'type' => 'Natural',
                'import_code' => 'FW',            
            ],


            // Pulp and paper logs
            [
                'id'    => $id++,
                'name' => 'Log for Pulp and Paper',
                'type' => 'Natural',
                'import_code' => 'NPNP',            
            ],
            [
                'id'    => $id++,
                'name' => 'Log for Pulp and Paper',
                'type' => 'Plantation',
                'import_code' => 'PPNP',            
            ],

        ];

        Species::insert($species);
    }
        
    
}
