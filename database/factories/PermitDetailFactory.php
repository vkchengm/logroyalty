<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermitDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // protected static int $log_no = 0;
    
    public function definition()
    {
        // self::$log_no++;
        // $this->log_no++;
        // static $log_no = 1;
        $royaltyRates = [150,200,250,290,300,350];

        
        return [
            // 'log_no' => self::$log_no,
            // 'log_no' => $log_no++,

            'length' => rand(8,30),
            'diameter_1' => rand(15,80),
            'diameter_2' => rand(15,80),

            'mean' => function (array $attributes) {
                return ($attributes['diameter_1']+$attributes['diameter_2'])/2;
            },

            'vol' => function (array $attributes) {
                return round(3.14159*pow(($attributes['mean']/2/100),2)*$attributes['length'], 2); 
            },

            // 'royalty' => $royaltyRates[rand(0,5)],

            // 'premium' => 30,

            // 'amount' => function (array $attributes) {
            //     return round(($attributes['vol']*$attributes['royalty'])+($attributes['vol']*$attributes['premium']), 2); 
            // },

            'defect_symbol' => 0,
            'defect_length' => 0,
            'defect_diameter' => 0,
            'species_id' => rand(1,60),
    
        ];
    }
}
