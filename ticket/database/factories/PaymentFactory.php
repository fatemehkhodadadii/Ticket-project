<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => 1,
            'invoice_number' => rand(1000000,5000000),
            'code' => rand(1000000,5000000),
            'amount' => rand(1000,50000), // password
            "status" => "paid",
            'created_at' => $this->faker->dateTimeBetween('-12 months','now'),
        ];
    }
}
