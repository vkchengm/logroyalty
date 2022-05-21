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

            [
                'id'            => $id++,
                'license_type'  => 'Yayasan Sabah',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Benta Wawasan',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'SFMLA',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '30',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Form 2B',
                'land_type_id'  => '2',
                'log_size_id'   => '5',
                'amount'        => '20',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Yayasan Sabah',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Yayasan Sabah',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],

            [
                'id'            => $id++,
                'license_type'  => 'Benta Wawasan',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '15',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Benta Wawasan',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '15',
            ],

            [
                'id'            => $id++,
                'license_type'  => 'SFMLA',
                'land_type_id'  => '3',
                'log_size_id'   => '2',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'SFMLA',
                'land_type_id'  => '3',
                'log_size_id'   => '3',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'SFMLA',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '20',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'SFMLA',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '20',
            ],

            [
                'id'            => $id++,
                'license_type'  => 'Form 2B',
                'land_type_id'  => '3',
                'log_size_id'   => '2',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Form 2B',
                'land_type_id'  => '3',
                'log_size_id'   => '3',
                'amount'        => '5',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Form 2B',
                'land_type_id'  => '3',
                'log_size_id'   => '4',
                'amount'        => '20',
            ],
            [
                'id'            => $id++,
                'license_type'  => 'Form 2B',
                'land_type_id'  => '3',
                'log_size_id'   => '5',
                'amount'        => '20',
            ],

        ];
        Premiums::insert($premiums);
        
    }
}
