<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bodongKU = \Faker\Factory::create('id_ID');
        // Array of image filenames
        $gambarbodongKU = [
            'L1.png', 'No Pics', 'L10.png', 'L11.png', 'L12.png', 'L13.png', 'L14.png', 'L15.png', 'L16.png', 'L17.png', 'L18.png',
            'L19.png', 'L2.png', 'L20.png', 'L21.png', 'L3.png', 'L4.png', 'L5.png', 'L6.png', 'L7.png', 'L8.png', 'L9.png',
            '', 'NULL', 'P1.png', 'P10.png', 'P11.png', 'P12.png', 'P13.png', 'p14.png', 'P15.png', 'p16.png',
            'P17.png', 'P2.png', 'P21.jpg', 'P3.png', 'P4.png', 'P5.png', 'P6.png', 'P7.png', 'P8.png', 'P9.png', ''
        ]; //dimasukan '' agar NULL  , untuk memberi contoh tidak ada gambar

        $spesialisasibodongKU = [
            "Anak",
            "Andrologi",
            "Anestesiologi dan Terapi Intensif",
            "Akupunktur Medik",
            "Bedah",
            "Bedah Anak",
            "Bedah Plastik, Rekonstruksi, dan Estetik",
            "Bedah Saraf",
            "Bedah Toraks, Kardiak, dan Vaskular",
            "Dermatologi dan Venereologi",
            "Emergency Medicine (Kegawatdaruratan Medik)",
            "Farmakologi Klinik",
            "Forensik dan Medikolegal",
            "Gizi Klinik",
            "Jantung dan Pembuluh Darah",
            "Kedokteran Fisik dan Rehabilitasi",
            "Kedokteran Jiwa",
            "Kedokteran Kelautan",
            "Kedokteran Keluarga Layanan Primer",
            "Kedokteran Nuklir dan Teranostik Molekuler",
            "Kedokteran Okupasi",
            "Kedokteran Olahraga",
            "Kedokteran Penerbangan",
            "Mikrobiologi Klinik",
            "Neurologi",
            "Obstetri dan Ginekologi",
            "Oftalmologi",
            "Onkologi Radiasi",
            "Orthopaedi dan Traumatologi",
            "Parasitologi Klinik",
            "Patologi Anatomi",
            "Patologi Klinik",
            "Penyakit Dalam",
            "Pulmonologi dan Kedokteran Respirasi",
            "Radiologi",
            "Telinga Hidung Tenggorok Bedah Kepala Leher",
            "Urologi",
        ];

        // return [
        //     'doctor_name' => "Dr. ". $bodongKU->name,
        //     'doctor_specialist' => fake()->randomElement($spesialisasibodongKU),
        //     'doctor_phone' => $bodongKU->phoneNumber,
        //     'doctor_email' => fake()->unique()->safeEmail(),
        //     'photo' => fake()->randomElement($gambarbodongKU),
        //     'address' => fake()->address('id_ID'),
        //     'sip'=>fake()->numberBetween(1000,9999),
        //     'id_ihs' => fake()->word(),
        //     'nik' =>fake()->numberBetween(2731288123,9232287629),
        // ];

        //         There are a few corrections needed in your DoctorFactory class:

        // Use $this->faker instead of fake() to access the Faker instance.
        // Remove the parentheses after fake() when calling methods like randomElement, unique, address, numberBetween, and word.
        // Ensure that the address method is called without arguments, as it doesn't accept any.

        return [
            'doctor_name' => "Dr. " . $bodongKU->name,
            'doctor_specialist' => $this->faker->randomElement($spesialisasibodongKU),
            'doctor_phone' => $bodongKU->phoneNumber,
            'doctor_email' => $this->faker->unique()->safeEmail(),
            'photo' => $this->faker->randomElement($gambarbodongKU),
            'address' => $this->faker->address('id_ID'),
            'sip' => $this->faker->numberBetween(1000, 9999),
            'id_ihs' => $this->faker->word,
            'nik' => $this->faker->numberBetween(2731288123, 9232287629),
        ];
    }
}
