<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;








/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $districtsKU = [
            'Cilandak', 'Kebayoran Baru', 'Pancoran', 'Mampang Prapatan', 'Pasar Minggu',
            'Setiabudi', 'Tebet', 'Kalideres', 'Cengkareng', 'Grogol Petamburan', 'Taman Sari'
            // Add more districts as needed
        ];
        $bodongKU = \Faker\Factory::create('id_ID');

        $provinsiBodongKU =   [
            'Nanggroe Aceh Darussalam',
            'Sumatra Utara',
            'Sumatra Selatan',
            'Sumatra Barat',
            'Bengkulu',
            'Riau',
            'Kepulauan Riau',
            'Jambi',
            'Lampung',
            'Bangka Belitung',
            'Banten',
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'DI Yogyakarta',
            'Jawa Timur',
            'Kalimantan Timur',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Kalimantan Selatan',
            'Kalimantan Utara',
            'Bali',
            'Nusa Tenggara Timur',
            'Nusa Tenggara Barat',
            'Gorontalo',
            'Sulawesi Barat',
            'Sulawesi Tengah',
            'Sulawesi Utara',
            'Sulawesi Tenggara',
            'Sulawesi Selatan',
            'Maluku Utara',
            'Maluku',
            'Papua Barat',
            'Papua',
            'Papua Selatan',
            'Papua Tengah',
            'Papua Pegunungan',
            'Papua Barat Daya',
        ];

        return [
            //'nik' => $this->faker->uuid,
            'nik' => $this->faker->numerify('################'),
            'kk' => $this->faker->numerify('################'),
            'name' => $bodongKU->name,
            'phone' => $bodongKU->phoneNumber,
            'email' => $this->faker->email,
            'gender' => $this->faker->randomElement(['male','female']),
            'birth_place' => $bodongKU->city,
            'birth_date' => $this->faker->date(),
            'is_deceased' => false, //$this->faker->boolean,

            //'address_line' => $this->faker->text,
            // To generate a random address line in Indonesia using Faker, you can use the address method to get a random address. Here's how you can do it:
            'address_line' => $this->faker->address('id_ID'),  //method address() doesn't accept a local parameter

            // To generate a random city name in Indonesia using Faker, you need to set the Faker locale to Indonesian. Then, you can use the city method to generate the city name. Here's how you can do it:
            'city' =>  $bodongKU->city,

            // To generate a random city code in Indonesia using Faker, you can use the city method to get a random city name and then manipulate it to create the city code. Here's how you can do it:
            'city_code' => strtoupper(substr( $bodongKU->city, 0, 3)) . '-' . $this->faker->randomNumber(4),

            // To generate a random province name in Indonesia using Faker, you need to set the Faker locale to Indonesian. Then, you can use the state method to generate the province name. Here's how you can do it:
            'province'  => $this->faker->randomElement($provinsiBodongKU), //method state() doesn't accept a local parameter
            'province_code' => $this->faker->word,


            'district' => $this->faker->randomElement($districtsKU),
            'district_code' => strtoupper(substr($this->faker->word, 0, 3)) . '-' . $this->faker->randomNumber(4),

            'village' => $this->faker->word,
            'village_code' => strtoupper(substr($this->faker->word, 0, 3)) . '-' . $this->faker->randomNumber(4),

            // To generate a random two-digit number between 01 and 22 using Faker, you can utilize the numberBetween method. Here's how you can do it:
            // This code generates a random number between 1 and 22 using the numberBetween method. Then, str_pad is used to ensure that the generated number is always two digits long, adding a leading zero if necessary.
            'rt' => str_pad($this->faker->numberBetween(1, 22), 2, '0', STR_PAD_LEFT),
            'rw' => str_pad($this->faker->numberBetween(1, 22), 2, '0', STR_PAD_LEFT),

            // This code generates a random number between 10000 and 99999, ensuring a five-digit postal code.
            'postal_code' => $this->faker->numberBetween(10000, 99999),
            'marital_status' => $this->faker->randomElement(['married','single']),

            // This code will generate a random Indonesian name and phone number using the id_ID locale in Faker.
            'relationship_name' => $bodongKU->name, // Generates a random Indonesian name pake $BodongKU
            'relationship_phone' => $bodongKU->phoneNumber,



        ];
    }
}
