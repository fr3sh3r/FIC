<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServicesMedicines>
 */
class ServiceMedicinesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $bodongKU = \Faker\Factory::create('id_ID');
        return [
            'name' => $bodongKU->name,
            'category' => $this->faker->randomElement(['medicine', 'consultation', 'treatment']),
            'price' => $this->faker->randomFloat(2, 0, 9999999999.99),
            'quantity' => $this->faker->randomNumber(),


        ]; //return


    }
}
