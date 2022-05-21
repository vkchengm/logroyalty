<?php

namespace Database\Seeders;

use App\Models\Licensee;
use Illuminate\Database\Seeder;

class LicenseeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $licensees = [
            [
                'id'    => 1,
                'name' => 'ABC',
                'type' => 'Company',
                // 'license_type' => 'SFMLA',
                // 'license_no' => 'SFMLA0123156',
                // 'licensee_ac_no' => 'AC32165489',
                // 'contact_no' => '0125487965',
            ],
            [
                'id'    => 2,
                'name' => 'XYZ',
                'type' => 'Company',
                // 'license_type' => 'SFMLA',
                // 'license_no' => 'SFMLA89765',
                // 'licensee_ac_no' => 'AC5465465',
                // 'contact_no' => '36255996',
            ],
            [
                'id'    => 3,
                'name' => 'Company A',
                'type' => 'Company',
                // 'license_type' => 'Form 2B',
                // 'license_no' => 'FIIB0123156',
                // 'licensee_ac_no' => 'AC69996489',
                // 'contact_no' => '0113326548',
            ],
            [
                'id'    => 4,
                'name' => 'Company B',
                'type' => 'Company',
                // 'license_type' => 'Form 2B',
                // 'license_no' => 'FIIB9555556',
                // 'licensee_ac_no' => 'AC3265165489',
                // 'contact_no' => '01925564666',
            ],
            [
                'id'    => 5,
                'name' => 'Richard Marx',
                'type' => 'Individual',
                // 'license_type' => 'Form 2B',
                // 'license_no' => 'FIIB9555556',
                // 'licensee_ac_no' => 'AC3265165489',
                // 'contact_no' => '01925564666',
            ],
            [
                'id'    => 6,
                'name' => 'Richard Marx and others',
                'type' => 'Group',
                // 'license_type' => 'Form 2B',
                // 'license_no' => 'FIIB9555556',
                // 'licensee_ac_no' => 'AC3265165489',
                // 'contact_no' => '01925564666',
            ],
        ];

        Licensee::insert($licensees);
    }
}
