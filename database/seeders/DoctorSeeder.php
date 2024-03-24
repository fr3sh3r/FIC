<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  *
    //  * @return void
    //  */
    public function run()
    {
        // Create a single doctor manually
        \App\Models\Doctor::create([
            'doctor_name' => "Dr Edi Mul",
            'doctor_specialist' => "Spesialis Happy",
            'doctor_phone' => "08112342211",
            'doctor_email' => "edi@dokterhappy.com",
            'sip' => "1234",
            'id_ihs' => "iniKodeIHS22",
            'nik' => "1234567890123456"
        ]);

        // // Create 30 doctor records using factory
        // \App\Models\Doctor::factory(30)->create();

        $faker = Faker::create('id_ID'); //

        $specialties = [
            'Kandungan & Kebidanan',
            'Kulit & Kelamin',
            'THT',
            'Penyakit Dalam',
            'Mata',
            'Umum',
            'Psikolog Klinis',
            'Saraf',
            'Paru',
            'Urologi',
            'Orthopaedi & Traumatologi',
            'Jantung & Pembuluh Darah',
            'Gastroenterologi - Hepatologi',
            'Bedah Umum',
            'Gizi Klinik',
            'Endokrin - Metabolik - Diabetes',
            'Andrologi',
            'Konservasi Gigi',
            'Bedah',
            'Ginjal - Hipertensi',
            'Gigi Anak',
            'Bedah Onkologi',
            'Reumatologi',
            'Hematologi & Onkologi Medik',
            'Bedah Mulut & Maksilofasial',
            'Bedah Saraf',
            'Rehabilitasi Medik & Kean Fisik',
            'Ortodonsia',
            'Periodonsia',
            'Kardiovaskular',
            'Akupuntur',
            'Fisioterapis',
            'Prostodonsia',
            'Bedah Vaskuler & Endovaskuler',
            'Penyakit Mulut',
            'Alergi - Imunologi',
            'Tropik - Infeksi',
            'Konselor Laktasi',
            'Psikolog Klinis Dewasa',
            'Mikrobiologi Klinik',
            'Kecantikan',
            'Radiologi',
            'Anestesiologi',
            'Patologi',
            'Bidan',
            'Apoteker',
            'Forensik',
            'Umum (DU)',
            'Hipnoterapis',
            'Farmakologi Klinik',
            'Jiwa',
            'Nutrisi',
            'Insurance',
            'Hewan',
            'Haloskin',
            'Konsultasi Medis',
            'Psikolog Non Klinis',
            'Anak',
            'Fetomaternal',
            'Jantung (Kardiologi Intervensi)',
            'Kulit & Kelamin (Alergi-Imunologi)',
            'Geriatri',
            'Psikosomatik',
            'Saraf (Neuro-onkologi)',
            'THT (Bronko-Esofagologi)',
            'Spesialis Bedah',
        ];

        $photoNames = [
            'L1', 'L2', 'L3', 'L4', 'L5', 'L6', 'L7', 'L8', 'L9', 'L10',
            'L11', 'L12', 'L13', NULL, 'L14', 'L15', 'L16', 'L17', 'L18', 'L19', 'L20',
            'L21', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10',
            'P11', 'P12', 'P13', 'P14', 'P15', 'P16', 'P17', NULL
        ];


        // Create doctor records with faker
        $doctors = [];
        for ($i = 0; $i < 30; $i++) {
            $doctors[] = [
                'doctor_name' => 'Dr ' . $faker->name, // Generate a random Indonesian name
                'doctor_specialist' => $faker->randomElement($specialties), // Random specialist
                'doctor_phone' => $faker->phoneNumber, // Random Indonesian phone number
                'doctor_email' => $faker->email, // Random email
                'sip' => $faker->numberBetween(1001, 9999), // Random 4-digit number
                'id_ihs' => 'ihs' . $faker->numberBetween(10000, 99999), // 'ihs' followed by 5 random numbers
                'nik' => $faker->numberBetween(3123456789012345, 8123456789012345), // Random 16-digit number
                'photo' => $faker->randomElement($photoNames) . '.png',
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }

        // Insert doctors data into the database
        Doctor::insert($doctors);
    }
}
