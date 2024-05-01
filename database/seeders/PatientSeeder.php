<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Auto generate 100 Patients
        // \App\Models\Patient::Factory(100)->create();

        $faker = Faker::create('id_ID'); //
        $provinces = [
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
            'Papua Barat Daya'
        ];

        // 'nik',
        // 'kk',
        // 'name',
        // 'phone',
        // 'email',
        // 'gender',
        // 'birth_place',
        // 'birth_date',
        // 'is_deceased',
        // 'address_line',
        // 'city',
        // 'city_code',
        // 'province',
        // 'province_code',
        // 'district',
        // 'district_code',
        // 'village',
        // 'village_code',
        // 'rt',
        // 'rw',
        // 'postal_code',
        // 'marital_status',
        // 'relationship_name',
        // 'relationship_phone'

        //bikin pasien minimal 30 , karena di patientschedule diset minimal 20 (spy aman)
        $patientna = [];
        for ($i = 0; $i < 30; $i++) {
            $patientna[] = [
                'nik' => $faker->numberBetween(3123456789012345, 8123456789012345), // Random 16-digit number
                'kk' => $faker->numberBetween(3123456789012345, 8123456789012345), // Random 16-digit number
                'name' => $faker->name, // Generate a random Indonesian name
                'phone' => $faker->phoneNumber, // Random Indonesian phone number
                'email' => $faker->email, // Random email
                'gender' => $faker->randomElement(['Laki', 'Perempuan']),
                'birth_place' => $faker->city,
                'birth_date' => $faker->date('Y-m-d', '-35000 days'), //random date from now to 35000days ago (97 years)
                'is_deceased' => 0,
                'address_line' => $faker->address,
                'city' => $faker->city,
                'city_code' => strtoupper($faker->regexify('[A-Z]{3}')), // Generate a random 3-letter uppercase string
                'province' => $faker->randomElement($provinces),
                'province_code' => $faker->randomNumber(2), // Generate a random 2-digit number
                'district' => 'Kec.' . $faker->city, //sebenarnya district = kecamatan
                'district_code' => $faker->randomNumber(5), // Generate a random 5-digit number
                'village' => 'Kel.' . $faker->city,
                'village_code' => $faker->randomNumber(6),
                'rt' => str_pad($faker->numberBetween(1, 19), 2, '0', STR_PAD_LEFT), //This will generate a random number between 1 and 19 inclusively. If you specifically want the numbers to have leading zeros (i.e., "01" instead of "1"), you can format the output like this:
                'rw' => $faker->numberBetween(1, 19), //ga pake angka 0 di depannya
                'postal_code' => $faker->randomNumber(5),
                'marital_status' => $faker->randomElement(['belum kawin', 'kawin', 'cerai hidup', 'cerai mati']),
                'relationship_name' => $faker->name, // Generate a random Indonesian name,
                'relationship_phone'  => $faker->phoneNumber, // Random Indonesian phone number
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }

        // Insert patient data into the database
        Patient::insert($patientna);
    }
}
