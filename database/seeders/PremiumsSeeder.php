<?php

namespace Database\Seeders;

use App\Models\Premiums;
use Illuminate\Database\Seeder;

class PremiumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=1;
        $premiums = [

            // NFM
            [
                'id'            => $id++,
                'licensee_type'  => 'YAYASAN SABAH',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'BENTA WAWASAN SDN BHD',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'OTHERS',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '30',
            ],

            // ITP
            [
                'id'            => $id++,
                'licensee_type'  => 'YAYASAN SABAH',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'YAYASAN SABAH',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],

            [
                'id'            => $id++,
                'licensee_type'  => 'BENTA WAWASAN SDN BHD',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'BENTA WAWASAN SDN BHD',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],

            [
                'id'            => $id++,
                'licensee_type'  => 'OTHERS',
                'land_type_id'  => '3',
                'log_size_id'   => '2',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'OTHERS',
                'land_type_id'  => '3',
                'log_size_id'   => '3',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'OTHERS',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '20',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'OTHERS',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '20',
            ],

            // state land            
            [
                'id'            => $id++,
                'licensee_type'  => 'ALL',
                'land_type_id'  => '5',
                'log_size_id'   => '2',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'ALL',
                'land_type_id'  => '5',
                'log_size_id'   => '3',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'ALL',
                'land_type_id'  => '5',
                'log_size_id'   => '4',
                'amount'        => '20',
            ],
            [
                'id'            => $id++,
                'licensee_type'  => 'ALL',
                'land_type_id'  => '5',
                'log_size_id'   => '5',
                'amount'        => '20',
            ],

        ];
        Premiums::insert($premiums);
        
    }
}
