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

            // Natural Log 1-20
            [
                'id'    => $id++,
                'name' => 'BELIAN',
                'type' => 'Natural',
                'class' => 'A',
                'import_code' => 'BL',
            ],
            [
                'id'    => $id++,
                'name' => 'MERBAU',
                'type' => 'Natural',
                'class' => 'B',
                'import_code' => 'MER',
            ],
            [
                'id'    => $id++,
                'name' => 'MERBAU LALAT',
                'type' => 'Natural',
                'class' => 'B',
                'import_code' => 'MBL',
            ],
            [
                'id'    => $id++,
                'name' => 'SELANGAN BATU',
                'type' => 'Natural',
                'class' => 'C',
                'import_code' => 'SB',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Pelawan-Pelawan',
            //     'type' => 'Natural',
            //     'class' => 'C',
            //     'import_code' => 'NPP',
            // ],
            [
                'id'    => $id++,
                'name' => 'KAYU MALAM',
                'type' => 'Natural',
                'class' => 'C',
                'import_code' => 'KMM',
            ],
            [
                'id'    => $id++,
                'name' => 'KAPUR',
                'type' => 'Natural',
                'class' => 'D',
                'import_code' => 'CR',
            ],
            [
                'id'    => $id++,
                'name' => 'KERUING',
                'type' => 'Natural',
                'class' => 'D',
                'import_code' => 'KR',
            ],
            [
                'id'    => $id++,
                'name' => 'AGATHIS',
                'type' => 'Natural',
                'class' => 'D',
                'import_code' => 'MGL',
            ], //9
            [
                'id'    => $id++,
                'name' => 'RED SERAYA',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'RS',
            ],
            [
                'id'    => $id++,
                'name' => 'WHITE SERAYA',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'WS',
            ],
            [
                'id'    => $id++,
                'name' => 'YELLOW SERAYA',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'YS',
            ],
            [
                'id'    => $id++,
                'name' => 'MELAPI',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'MP',
            ],
            [
                'id'    => $id++,
                'name' => 'KEMBANG',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'KEM',
            ],
            [
                'id'    => $id++,
                'name' => 'KEMBANG SEMANGKOK',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'KSM',
            ],
            [
                'id'    => $id++,
                'name' => 'NYATOH',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'NT',
            ],
            [
                'id'    => $id++,
                'name' => 'OBA SULUK',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'OS',
            ],
            [
                'id'    => $id++,
                'name' => 'PENGIRAN',
                'type' => 'Natural',
                'class' => 'E',
                'import_code' => 'PG',
            ], //18

            // [
            //     'id'    => $id++,
            //     'name' => 'ALBIZIA PROCERA',
            //     'type' => 'Natural',
            //     'class' => 'F',
            //     'import_code' => 'ABP',
            // ]
            // [
            //     'id'    => $id++,
            //     'name' => 'ACACIA MANGIUM',
            //     'type' => 'Natural',
            //     'class' => 'F',
            //     'import_code' => 'ACA',
            // ]
            [
                'id'    => $id++,
                'name' => 'AGUTUD',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AGD',
            ],

            [
                'id'    => $id++,
                'name' => 'ALIPAGI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AGI',
            ],

            [
                'id'    => $id++,
                'name' => 'ANGGUK-ANGGUK',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AGK',
            ],
                
            [
                'id'    => $id++,
                'name' => 'ANGAN-ANGAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AGN',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'ANGAR-ANGAR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AGR',
            ],
            [
                'id'    => $id++,
                'name' => 'AMPAS TEBU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'AMT',
            ],

            [
                'id'    => $id++,
                'name' => 'ANGSANA/PTEROCARPUS SPP',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'ANG',
            ],

            [
                'id'    => $id++,
                'name' => 'ALANAGNI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'ANI',
            ],

            [
                'id'    => $id++,
                'name' => 'ARAH',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'ARH',
            ],

            [
                'id'    => $id++,
                'name' => 'ARU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'ARU',
            ],

            [
                'id'    => $id++,
                'name' => 'ASSAM',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'ASS',
            ],

            [
                'id'    => $id++,
                'name' => 'BEBATA',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BBA',
            ],

            [
                'id'    => $id++,
                'name' => 'BAMBANGAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BBG',
            ],

            [
                'id'    => $id++,
                'name' => 'BELIMBING HUTAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BBH',
            ],

            [
                'id'    => $id++,
                'name' => 'BEMBALOR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BBR',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BACANG',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BCG',
            ],
            [
                'id'    => $id++,
                'name' => 'BENADAK',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BDK',
            ],

            [
                'id'    => $id++,
                'name' => 'BERANGAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BER',
            ],

            [
                'id'    => $id++,
                'name' => 'BEUS',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BEU',
            ],

            [
                'id'    => $id++,
                'name' => 'BANGKULATAN/ILEX SPP',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BGN',
            ],

            [
                'id'    => $id++,
                'name' => 'BUNGOR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BGR',
            ],
	
            [
                'id'    => $id++,
                'name' => 'BERUNGIS',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BGS',
            ],
            [
                'id'    => $id++,
                'name' => 'BUAHAN-BUAHAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BHN',
            ],

            [
                'id'    => $id++,
                'name' => 'BIKU-BIKU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BIK',
            ],

            [
                'id'    => $id++,
                'name' => 'BINTANGOR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BIN',
            ],

            [
                'id'    => $id++,
                'name' => 'BANJUTAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BJN',
            ],

            [
                'id'    => $id++,
                'name' => 'BANGKITA',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKA',
            ],
            [
                'id'    => $id++,
                'name' => 'BANGKUDU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKD',
            ],

            [
                'id'    => $id++,
                'name' => 'BANGKAWANG',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKG',
            ],
            [
                'id'    => $id++,
                'name' => 'BAKAU KURAP',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKK',
            ],
    	
                	
            [
                'id'    => $id++,
                'name' => 'BANGKAL',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKL',
            ],
            [
                'id'    => $id++,
                'name' => 'BARANGKAR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKN',
            ],
            [
                'id'    => $id++,
                'name' => 'BANGKULAT',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKT',
            ],
            [
                'id'    => $id++,
                'name' => 'BANGKAU-BANGKAU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BKU',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BINUANG',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BN',
            ],
            [
                'id'    => $id++,
                'name' => 'BELUNO',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BNO',
            ],

            [
                'id'    => $id++,
                'name' => 'BOYOI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BOY',
            ],
            [
                'id'    => $id++,
                'name' => 'BURUNI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BRI',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BURUT-BURUT',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BRT',
            ],
            [
                'id'    => $id++,
                'name' => 'BERINDU',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BRU',
            ],
            [
                'id'    => $id++,
                'name' => 'BESI-BESI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BSI',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BUSOK-BUSOK',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BSK',
            ],
            [
                'id'    => $id++,
                'name' => 'BALINGASAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BSN',
            ],
            [
                'id'    => $id++,
                'name' => 'BASSWOOD',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BSW',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BUTA-BUTA',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BTA',
            ],
            [
                'id'    => $id++,
                'name' => 'BINITAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BTN',
            ],

            [
                'id'    => $id++,
                'name' => 'BALATOTAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BTT',
            ],
            [
                'id'    => $id++,
                'name' => 'BUNGA GADONG',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BUG',
            ],

            [
                'id'    => $id++,
                'name' => 'BUAK-BUAK',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BUK',
            ],
            [
                'id'    => $id++,
                'name' => 'BUAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BUN',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'BAWANG HUTAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BW2',
            ],
            [
                'id'    => $id++,
                'name' => 'BAWANG-BAWANG',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BWG',
            ],

            [
                'id'    => $id++,
                'name' => 'BAYOR',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'BY',
            ],
            [
                'id'    => $id++,
                'name' => 'CHENDANA',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'CDA',
            ],

            [
                'id'    => $id++,
                'name' => 'CHEMPAKA',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'CHM',
            ],
            [
                'id'    => $id++,
                'name' => 'DADAP',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'DDP',
            ],
            [
                'id'    => $id++,
                'name' => 'DUNGUN LAUT',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'DGN',
            ],
            [
                'id'    => $id++,
                'name' => 'DAMAK-DAMAK',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'DMK',
            ],
                	
            [
                'id'    => $id++,
                'name' => 'DARAH-DARAH/PENERAHAN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'DRA',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'DURIAN',
            //     'type' => 'Natural',
            //     'class' => 'F',
            //     'import_code' => 'DRN'
            // ],,

            [
                'id'    => $id++,
                'name' => 'DUNGUN',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'DUN',
            ],
            [
                'id'    => $id++,
                'name' => 'GATAL-GATAL',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'GAT',
            ],
            [
                'id'    => $id++,
                'name' => 'GRUBAI',
                'type' => 'Natural',
                'class' => 'F',
                'import_code' => 'GBI',
            ],
                // EUCALYPTUS SPP	EUC                	
                	
                [
                    'id'    => $id++,
                    'name' => 'GAHARU/KARAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GIAM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GIM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GAPIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GIS',
                ],
                            	
                	
                [
                    'id'    => $id++,
                    'name' => 'GAGIL/MERAWAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GALANG-GALANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GLG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GELAM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GLM',
                ],
            
                	
                [
                    'id'    => $id++,
                    'name' => 'GUMA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GMA',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GANGULANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GNG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GAPAS-GAPAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GPS',
                ],
            
                	
                	
                // GMELINA AROBOREA/YEMANE	GME
                	
                [
                    'id'    => $id++,
                    'name' => 'GAMBIR HUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GRH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GERUSEH PUTIH/ANTIDESMA MONTANUM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GRP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'GERITING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GRT',
                ],
            
                	
                [
                    'id'    => $id++,
                    'name' => 'GARU-GARU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GRU',
                ],
    
                	
                	
                // GETAH/RUBBERWOOD	GTH
                [
                    'id'    => $id++,
                    'name' => 'GIEWEI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'GWI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'HULUMDOM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'HLM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'IMPAS/KEMPAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'IMP',
                ],
                            	
                	
                [
                    'id'    => $id++,
                    'name' => 'IPIL',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'IPL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'IRUL',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'IRL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'JONGKONG/MEDANG TABAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'J',
                ],
            
                [
                    'id'    => $id++,
                    'name' => 'JAMBU-JAMBU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'JAM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'JIAK/SYMPLOCOS FASCICULATA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'JAK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'JELUTONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'JLT',
                ],
                	
                [
                    'id'    => $id++,
                    'name' => 'JARING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'JRG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'JARUM-JARUM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'JRM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAYU DUSUN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KAD',
                ],

                	
                	
                	
                // JATI	JTI
                [
                    'id'    => $id++,
                    'name' => 'KAYU GARANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KAG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAYU MANIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KAM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAYU ARA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KAR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUBAMBAN-KUBAMBAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KBN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KALAMBIAO',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KBU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAYU CHINA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KCN',
                ],
                	
                	
                [
                    'id'    => $id++,
                    'name' => 'KEDONDONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KERODONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KDG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KELAMONDOI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KDI',
                ],

                	
                [
                    'id'    => $id++,
                    'name' => 'KELAPA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KEL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUDOK-KUDOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KDK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KANDIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KDS',
                ],

                	
                	
                	
                [
                    'id'    => $id++,
                    'name' => 'KEMUNING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KEG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KEPALA TUNDANG/BUCHANANIA ARBORESCENS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KET',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KIAM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KIM',
                ],

                	
                    
                	
                [
                    'id'    => $id++,
                    'name' => 'KERANGJI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KJ',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUNGKURAD',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KKD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KATONG-KATONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KKT',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'KULIMPAPA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KLP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KILAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KLS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KARAMUNTING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KMG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'KAMIRI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KMR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KELANUS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KNS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUNAU-KUNAU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KNU',
                ],

                    
                	
                // KUPANG	KNG
                	
                [
                    'id'    => $id++,
                    'name' => 'KONDOLON',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KON',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KOPING-KOPING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KOP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAPAYANG AMBOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KPA',
                ],

                	
                [
                    'id'    => $id++,
                    'name' => 'KALUMPANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KPG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAPUS TULANGSAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KRP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KARAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KRY',
                ],

                	
                	
                // KAPOK	KPK
                    
                	
                [
                    'id'    => $id++,
                    'name' => 'KASAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KSI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KAPAS-KAPAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KSS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KERANTAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KTI',
                ],

                	
                    
                	
                [
                    'id'    => $id++,
                    'name' => 'KATOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KTK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUBIN/TELINGA GAJAH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KUB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KUNGKUR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KUR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'KEPAYANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KYG',
                ],

                	
                	
                	
                [
                    'id'    => $id++,
                    'name' => 'KEMBAYU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'KYU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LAYANG-LAYANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LAY',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LUDAI SUSU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LDS',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'LINKABONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LKB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LOKON',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LKN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LAMAU-LAMAU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LMU',
                ],
	
                	
                	
                // LIMPAGA/AZADIRACHTA EXCELSA	LM
                [
                    'id'    => $id++,
                    'name' => 'LUNAU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LNU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LOPOKAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LPK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'LISI-LISI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'LSI',
                ],

                	
                	
                // LARAN/KELEMPAYAN	LRN
                [
                    'id'    => $id++,
                    'name' => 'MALAGANGAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MA',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MATA BUAYA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MAB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MAGAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MAG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MAHOGANI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MAH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MALABIRA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MBA',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MEDANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MD',
                ],

                	
                	
                    
                [
                    'id'    => $id++,
                    'name' => 'MANDAILAS/PARASTEMON UROPHYLLUM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MDS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MENGARIS/TUALANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MEN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MENGKENIAB',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MGB',
                ],

                	
                	
                    
                [
                    'id'    => $id++,
                    'name' => 'MANUNGGAL/QUASSIA BORNEENSIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MGG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MENGIS HUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MGH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MENGKULAR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MGR',
                ],

                	
                	
                    
                [
                    'id'    => $id++,
                    'name' => 'MOROGIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MGS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MARABAHAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MHI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MERKUBONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MKB',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MATA KUCHING',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MKC',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MANGKAPANG DARAT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MKD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MALULOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MLL',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MEMPENING/LITHOCARPUS SPP',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MMP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MANIK-MANIK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MNK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MINYAK BEROK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MNY',
                ],

                	
                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MARAPANGI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MPI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MEMPOYAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MPY',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MERANSI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MSI',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MONSIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MST',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MALITAP BUKIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MTB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MERITAM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MTM',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'MALLOTUS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MTS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'MERBATU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'MTU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'NANGKA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'NGK',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'NIPIS KULIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'NIK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'OBAH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'OB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'OBAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'OBS',
                ],
	
                	
                    
                	
                [
                    'id'    => $id++,
                    'name' => 'ODOPON PUTEH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'ODP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'OT IMPORT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'OTM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PAKUDITA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PAK',
                ],

                	
                    
                	
                	
                // BATAI/PARASERIENTHES	PAR
                [
                    'id'    => $id++,
                    'name' => 'PAUH-PAUH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PAU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PENGOLABAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PBN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PANCHIT-PANCHIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PCT',
                ],
                	
                	
                // PINES CARIBAEA	PC
                [
                    'id'    => $id++,
                    'name' => 'PEDADA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PDD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PAMATODON',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PDN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PERAH IKAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PEI',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PENATAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PEN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PAGAR ANAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PGK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PENAGA LAUT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PGL',
                ],

                	
                    
                	
                [
                    'id'    => $id++,
                    'name' => 'PANGOS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PGS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PIANGGU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PGU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PERAPAT HUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PH',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PAHIT-PAHIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PHT',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PINGGAU-PINGGAU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PIN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PISANG-PISANG/MEMPISANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PIS',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PELAJAU/PENTASPODON MOTLEYI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PJU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PAUH KIJANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PKJ',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PALIU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PLU',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PEREPAT BURUNG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PPB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PEREPAT LAUT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PPL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PEREPAT PAYA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PPP',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PERUPOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PRP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PARIUS-PARIUS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PRS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PUNGSU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PSU',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PETAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PTI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PULUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PTN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PUTUT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PTT',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PUDU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PUD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PULAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PUL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'PUTAT PAYA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PUT',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'PELAWAN-PELAWAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'PWN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RAMIN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'R',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RESAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RB',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'RAMBAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RBI',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RADIATA PINE',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RDP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RANDAGONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RGN',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'RENGAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RGS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RANGGU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RGU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RUKAM',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RKM',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'RANUK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RNK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RED OAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'ROX',
                ],
                [
                    'id'    => $id++,
                    'name' => 'RAIN TREE',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RTE',
                ],

                	
                	
                    
                [
                    'id'    => $id++,
                    'name' => 'RAMBUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'RTN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SABAH EBONY',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SAE',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SAGA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SAG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SAKA-SAKA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SAK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SAPANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SAP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SELANGAN BATU PENAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SBK',
                ],

                	
                	
                    
                [
                    'id'    => $id++,
                    'name' => 'SELANGAN BATU MERAH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SBM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SEDAMAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SDM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SENDOK-SENDOK MATA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SEN',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SERUNGAN/GERONGGANG/CRYTOXYLUM SP',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SENGKUANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SGK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SIMPOH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SIM',
                ],

                	
                	
                // SENTANG	STG
                [
                    'id'    => $id++,
                    'name' => 'SIREH-SIREH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SIR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SUKUNG-SUKUNG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SKG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SAMALA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SLA',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SELUMAR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SLR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SAUMA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SMA',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SIMPOH GAJAH',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SMG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SUMU SILAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SMS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SEMPILAU BUKIT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPB',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SUMPING GUDAUN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SELANGAN PENAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SEMPILOR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SPRUCE',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPR',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SEPATIR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SPT',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SESENDOM/SENDOK-SENDOK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SSD',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SURUSOP',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SSP',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'SENTUL HUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'STH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SUKUN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SUK',
                ],
                [
                    'id'    => $id++,
                    'name' => 'SURIAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'SUR',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TAPAI APAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TAA',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TUAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TAI',
                ],
                // [
                //     'id'    => $id++,
                //     'name' => '',
                //     'type' => 'Natural',
                //     'class' => 'F',
                //     'import_code' => ''
                // ],

                	
                [
                    'id'    => $id++,
                    'name' => 'TAMBONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TAM',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAPONG-TAPONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TAP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAMBALUANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TBG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TAMBALIKAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TBN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TABARUS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TBS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TINDOT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TDT',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TETEPONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TEP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TENGKAWANG-KAWANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TANGAR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TGG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TANGGAL/OCHANOSTACHYS AMENTACEA',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TGL',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TIMBAGAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TGN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TENGAR/CERIOPS TAGAL',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TGR',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TINGO-TINGO',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TGU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TIMAHAR',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'THR',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAKALIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TKS',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TALISAI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TLS',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAKALIU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TLU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TEMBUSU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TM',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TIMADANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TMG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAMPOI HUTAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TMP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TAPION KIRABAS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TNS',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TOROG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TOG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TREE OF HEAVEN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TOH',
                ],
                [
                    'id'    => $id++,
                    'name' => 'BARRINGTONSIA SPP/TAMPALANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TPG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TAMPALUAN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TPN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TADAPON PUAK',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TPP',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TANDOROPIS',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TPS',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TERENTANG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TTG',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TELUTO',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TTO',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TUI',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TUI',
                ],

                // TERAP	TRP
                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TUJOT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TUJ',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TULAU',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TUU',
                ],
                [
                    'id'    => $id++,
                    'name' => 'TIMBARAYONG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TYG',
                ],

                	
                	
                [
                    'id'    => $id++,
                    'name' => 'TUYOT',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'TYT',
                ],
                [
                    'id'    => $id++,
                    'name' => 'UPUN',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'UPN',
                ],
                [
                    'id'    => $id++,
                    'name' => 'YAMANE',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'YMN',
                ],
	
                [
                    'id'    => $id++,
                    'name' => 'MISSING LOG',
                    'type' => 'Natural',
                    'class' => 'F',
                    'import_code' => 'ZZZ',
                ],
	
                	
                    
                	
                    
                	
                









            // [
            //     'id'    => $id++,
            //     'name' => 'Others',
            //     'type' => 'Natural',
            //     'import_code' => 'NOT',
            // ],
            [
                'id'    => $id++,
                'name' => 'MACARANGA',
                'class' => 'G',
                'type' => 'Natural',
                'import_code' => 'NMC',
            ],

            // Fuel Wood 21
            // [
            //     'id'    => $id++,
            //     'name' => 'FUEL WOOD',
            //     'type' => 'Natural',
            //     'import_code' => 'NFW',            
            // ],

            // Plantation Log
            [
                'id'    => $id++,
                'name' => 'ACACIA MANGIUM',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'ACA',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'ALBIZIA FALCATARIA',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PAF',
            // ],
            [
                'id'    => $id++,
                'name' => 'ALBIZIA PROCERA',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'ABP',
            ],
            [
                'id'    => $id++,
                'name' => 'EUCALYPTUS SPP',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'EUC',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'EUCALYPTUS DEGLUPTA',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PED',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'EUCALYPTUS PELITA',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PEP',
            // ],
            [
                'id'    => $id++,
                'name' => 'GMELINA ARBOREA',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'GME',
            ],
            [
                'id'    => $id++,
                'name' => 'PINES CARIBAEA',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'PC',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'ARAUCARIA CUNNINGHAMII',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PAC',
            // ],
            [
                'id'    => $id++,
                'name' => 'TEAK/JATI',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'JTI',
            ],

            // [
            //     'id'    => $id++,
            //     'name' => 'EUCALYPTUS GRANDIS',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PEG',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'MANGIFERA CAESIA',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PMC',
            // ],
            [
                'id'    => $id++,
                'name' => 'AZADIRACHTA EXCELSA',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'LM',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'BINUANG',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PBN',
            // ],
            [
                'id'    => $id++,
                'name' => 'LARAN',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'LRN',
            ],

            [
                'id'    => $id++,
                'name' => 'GETAH',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'GTH',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'MAHOGANY',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PMH',
            // ],
            [
                'id'    => $id++,
                'name' => 'KAPOK',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'KPK',
            ],
            [
                'id'    => $id++,
                'name' => 'KUPANG',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'KNG',
            ],
            [
                'id'    => $id++,
                'name' => 'TERAP',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'TRP',
            ],
            [
                'id'    => $id++,
                'name' => 'SENTANG',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'STG',
            ],
            [
                'id'    => $id++,
                'name' => 'DURIAN',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'DRN',
            ],
            // [
            //     'id'    => $id++,
            //     'name' => 'EUCALPTUS HYBRID',
            //     'class' => 'H',
            //     'type' => 'Plantation',
            //     'import_code' => 'PEH',
            // ],
            [
                'id'    => $id++,
                'name' => 'BATAI',
                'class' => 'H',
                'type' => 'Plantation',
                'import_code' => 'PAR',
            ],

            //Converted Timber 45-63
            // [
            //     'id'    => $id++,
            //     'name' => 'BELIAN',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NBL',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'MERBAU',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NMB',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Merbau Lalat',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NMBL',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Selangan Batu',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'SB',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Pelawan-Pelawan',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NPP',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Kayu Malam',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NKM',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Kapur',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NKP',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Keruing',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NKR',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Agathis',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NAG',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Red Seraya',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NRS',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'White Seraya',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NWS',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Yellow Seraya',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NYS',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Melapi',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NMLP',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Kembang',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NKB',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Kembang Semangkok',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NKS',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Nyatoh',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NNY',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Oba Suluk',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NOS',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Pengiran',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NPG',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Others',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NOT',
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Macaranga',
            //     'class' => 'F',
            //     'type' => 'Converted',
            //     'import_code' => 'NMC',
            // ],




            // Pulp and paper logs
            // [
            //     'id'    => $id++,
            //     'name' => 'Log for Pulp and Paper',
            //     'type' => 'Converted',
            //     'import_code' => 'NPNP',            
            // ],
            // [
            //     'id'    => $id++,
            //     'name' => 'Log for Pulp and Paper',
            //     'type' => 'Plantation',
            //     'import_code' => 'PPNP',            
            // ],

        ];

        Species::insert($species);
    }
        
    
}
