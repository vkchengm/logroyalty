<?php

namespace Database\Factories;

use App\Models\Permit;
use App\Models\Region;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermitFactory extends Factory
{
    protected $model = Permit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $logging_methods = ['Non-RIL', 'RIL', 'Helicopter'];
        $markets = ['Export', 'Local Processing'];
        $users = [2,10,19,20];

        return [
            'license_no' => $this->faker->text(10),
            'logging_method' => $logging_methods[rand(0,2)],
            'market' => $markets[rand(0, 1)],
            'licensee_ac_no' => $this->faker->text(10),
            'description' => $this->faker->text(30),
            
            'place_of_scaling' => $this->faker->text(15),
            'scaled_date' => $this->faker->unique()->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
            'name_of_scaler' => $this->faker->text(20),
            'owner_of_property_hammer_mark' => $this->faker->text(10),
            'registered_property_hammer_mark' => $this->faker->text(10),
            'status' => 'approved',
    
            // 'payment_date',
            // 'receipt_no',
            // 'valid_from',
            // 'valid_to',
            'billed_vol' => rand(5, 500),
            'billed_amount' => rand(800, 200000),
    
            'user_id' => $users[rand(0,3)],
            'district_id' => rand(1,15),
            'land_type_id' => rand(2,5),


            'dfo_id' => function (array $attributes) {
                return District::find($attributes['district_id'])->dfo_id;
            },

            'fo_id' => function (array $attributes) {
                return Region::find(District::find($attributes['district_id'])->region_id)->fo_id;
            },

            // 'kppm_id',
        ];
    }
}
