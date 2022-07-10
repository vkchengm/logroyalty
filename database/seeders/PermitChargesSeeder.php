<?php

namespace Database\Seeders;

use App\Models\Permit;
use App\Models\PermitCharge;
use Illuminate\Database\Seeder;

class PermitChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permit::query()
            ->chunk(10, function ($permits) {
                foreach ($permits as $permit) {
                   PermitCharge::factory(\Arr::random([5,10,15]))->create([
                       'permit_id' => $permit->id
                   ]);
                }
            });
    }
}
