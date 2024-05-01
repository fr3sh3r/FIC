<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileClinic>
 */
class ProfileClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //Contoh Data
    // 'name' => 'Klinik Segar Bugar',
    // 'address' => 'Jl. Gatot Subroto no. 72 Jakarta',
    // 'phone' => '02155829122',
    // 'email' => 'service@klinik_segar_bugar.com',
    // 'doctor_name' => 'Dr. Richard Lee',
    // 'unique_code' => '123456',


    public function definition(): array
    {
        $bodongKU = \Faker\Factory::create('id_ID');

        return [
            'name' => $bodongKU->randomElement(['Puskesmas', 'Klinik']) . ' ' . $bodongKU->unique()->company(),
            'address' => $this->faker->address('id_ID') . ' ' . $bodongKU->city,
            'phone' => $bodongKU->phoneNumber,
            'email' => $bodongKU->companyEmail(),
            'doctor_name' => "Dr. " . $bodongKU->name,
            'unique_code' => $this->faker->unique()->numberBetween(100000, 999999), // Generate a unique six-digit number

        ];
    }
}
