<?php

namespace Database\Factories;

use App\Models\Permit;
use App\Models\PermitCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermitChargeFactory extends Factory
{
    protected $model = PermitCharge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'unit'        => $this->faker->shuffleString('abcd'),
            'description' => $this->faker->sentence,
            'amount'      => $this->faker->numberBetween(10, 100),
            'total'       => $this->faker->numberBetween(10, 1000),
            'permit_id'   => Permit::query()->inRandomOrder()->value('id')
        ];
    }
}
