<?php

namespace Database\Seeders;

use App\Models\Permit;
use App\Models\PermitDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permit::factory()->times(50)->create();

        // $permit = Permit::factory()->times(50)
        $permit = Permit::factory()->count(200)
            // ->haspermitDetails(rand(5,25))
            ->has(
                PermitDetail::factory()
                    ->count(rand(5,25)) 
                    ->state(new Sequence(
                        fn ($sequence) => ['log_no' => $sequence->index],)
                    ) 
            )
            
            ->create();
    }
}
