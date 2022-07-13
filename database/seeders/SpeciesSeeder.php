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
                'name' => 'Acacia Mangium',
                'type' => 'Plantation',
                'import_code' => 'PAM',
            ],
            [
                'id'    => $id++,
                'name' => 'Albizia Falcataria',
                'type' => 'Plantation',
                'import_code' => 'PAF',
            ],
            [
                'id'    => $id++,
                'name' => 'Albizia Procera',
                'type' => 'Plantation',
                'import_code' => 'PAP',
            ],
            [
                'id'    => $id++,
                'name' => 'Eucalyptus Deglupta',
                'type' => 'Plantation',
                'import_code' => 'PED',
            ],
            [
                'id'    => $id++,
                'name' => 'Eucalyptus Pelita',
                'type' => 'Plantation',
                'import_code' => 'PEP',
            ],
            [
                'id'    => $id++,
                'name' => 'Gmelina Arborea',
                'type' => 'Plantation',
                'import_code' => 'PGA',
            ],
            [
                'id'    => $id++,
                'name' => 'Pines Caribaea',
                'type' => 'Plantation',
                'import_code' => 'PPC',
            ],
            [
                'id'    => $id++,
                'name' => 'Araucaria cunninghamii',
                'type' => 'Plantation',
                'import_code' => 'PAC',
            ],
            [
                'id'    => $id++,
                'name' => 'Teak/Jati',
                'type' => 'Plantation',
                'import_code' => 'PTK',
            ],

            [
                'id'    => $id++,
                'name' => 'Eucalyptus Grandis',
                'type' => 'Plantation',
                'import_code' => 'PEG',
            ],
            [
                'id'    => $id++,
                'name' => 'Mangifera Caesia',
                'type' => 'Plantation',
                'import_code' => 'PMC',
            ],
            [
                'id'    => $id++,
                'name' => 'Azadirachta Excelsa',
                'type' => 'Plantation',
                'import_code' => 'PAE',
            ],
            [
                'id'    => $id++,
                'name' => 'Binuang',
                'type' => 'Plantation',
                'import_code' => 'PBN',
            ],
            [
                'id'    => $id++,
                'name' => 'Laran',
                'type' => 'Plantation',
                'import_code' => 'PLR',
            ],

            [
                'id'    => $id++,
                'name' => 'Getah',
                'type' => 'Plantation',
                'import_code' => 'PGT',
            ],
            [
                'id'    => $id++,
                'name' => 'Mahogany',
                'type' => 'Plantation',
                'import_code' => 'PMH',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapok',
                'type' => 'Plantation',
                'import_code' => 'PKK',
            ],
            [
                'id'    => $id++,
                'name' => 'Kupang',
                'type' => 'Plantation',
                'import_code' => 'PKG',
            ],
            [
                'id'    => $id++,
                'name' => 'Terap',
                'type' => 'Plantation',
                'import_code' => 'PTR',
            ],
            [
                'id'    => $id++,
                'name' => 'Sentang',
                'type' => 'Plantation',
                'import_code' => 'PST',
            ],
            [
                'id'    => $id++,
                'name' => 'Durian',
                'type' => 'Plantation',
                'import_code' => 'PDR',
            ],
            [
                'id'    => $id++,
                'name' => 'Eucalptus Hybrid',
                'type' => 'Plantation',
                'import_code' => 'PEH',
            ],
            [
                'id'    => $id++,
                'name' => 'Batai',
                'type' => 'Plantation',
                'import_code' => 'PBT',
            ],

            //Converted Timber
            [
                'id'    => $id++,
                'name' => 'Belian',
                'type' => 'Converted',
                'import_code' => 'CBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau',
                'type' => 'Converted',
                'import_code' => 'CMB',
            ],
            [
                'id'    => $id++,
                'name' => 'Merbau Lalat',
                'type' => 'Converted',
                'import_code' => 'CMBL',
            ],
            [
                'id'    => $id++,
                'name' => 'Selangan Batu',
                'type' => 'Converted',
                'import_code' => 'CSB',
            ],
            [
                'id'    => $id++,
                'name' => 'Red Seraya',
                'type' => 'Converted',
                'import_code' => 'CRS',
            ],
            [
                'id'    => $id++,
                'name' => 'White Seraya',
                'type' => 'Converted',
                'import_code' => 'CWS',
            ],
            [
                'id'    => $id++,
                'name' => 'Yellow Seraya',
                'type' => 'Converted',
                'import_code' => 'CYS',
            ],
            [
                'id'    => $id++,
                'name' => 'Melapi',
                'type' => 'Converted',
                'import_code' => 'CMLP',
            ],
            [
                'id'    => $id++,
                'name' => 'Kapur',
                'type' => 'Converted',
                'import_code' => 'CKP',
            ],
            [
                'id'    => $id++,
                'name' => 'Keruing',
                'type' => 'Converted',
                'import_code' => 'CKR',
            ],
            [
                'id'    => $id++,
                'name' => 'Agathis',
                'type' => 'Converted',
                'import_code' => 'CAG',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang',
                'type' => 'Converted',
                'import_code' => 'CKB',
            ],
            [
                'id'    => $id++,
                'name' => 'Kembang Semangkok',
                'type' => 'Converted',
                'import_code' => 'CKS',
            ],
            [
                'id'    => $id++,
                'name' => 'Nyatoh',
                'type' => 'Converted',
                'import_code' => 'CNY',
            ],
            [
                'id'    => $id++,
                'name' => 'Oba Suluk',
                'type' => 'Converted',
                'import_code' => 'COS',
            ],
            [
                'id'    => $id++,
                'name' => 'Pengiran',
                'type' => 'Converted',
                'import_code' => 'CPG',
            ],
            [
                'id'    => $id++,
                'name' => 'Perupok',
                'type' => 'Converted',
                'import_code' => 'CPR',
            ],
            [
                'id'    => $id++,
                'name' => 'Macaranga',
                'type' => 'Converted',
                'import_code' => 'CMC',
            ],
            [
                'id'    => $id++,
                'name' => 'Others',
                'type' => 'Converted',
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
