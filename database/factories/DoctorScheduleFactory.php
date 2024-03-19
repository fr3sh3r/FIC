<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // day ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
            'doctor_id' => \App\Models\Doctor::Factory(),
            'day' => $this->faker->randomElement(['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']),
            //'day' => ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'][array_rand(['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'])],
            //'time' => $this->faker->word,
            'time' => $this->faker->randomElement(['08:00-10:00','10:00-12:00','12:00-14:00','14:00-16:00','16:00-18:00','18:00-20:00']),
            'status' => $this->faker->randomElement(['active','inactive']),
            'note' => $this->faker->word,
            //
        ];
    }
}
