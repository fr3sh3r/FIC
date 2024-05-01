<?php

namespace Database\Seeders;

use App\Models\ProfileClinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Carbon;

class ProfileClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodongKU = Faker::create('id_ID');

        $profileclinicna = [];


        for ($i = 0; $i < 17; $i++) {

            $companyName = $bodongKU->randomElement(['Puskesmas', 'Klinik']) . ' ' . $bodongKU->unique()->company();
            // Array kata-kata yang ingin dihapus
            $wordsToRemove = ['PT ', ' (Persero)', 'PJ ', 'PD ', 'Perum ', 'UD ', ' Tbk', 'CV ', 'Fa ', 'Yayasan '];

            // Hilangkan kata-kata dari nama perusahaan
            $filteredName = str_replace($wordsToRemove, '', $companyName);
            $profileclinicna[] = [


                'name' => $filteredName,
                'address' => $bodongKU->address('id_ID') . ' ' . $bodongKU->city,
                'phone' => $bodongKU->phoneNumber,
                'email' => $bodongKU->companyEmail(),
                'doctor_name' => "Dr. " . $bodongKU->name,
                'unique_code' => $bodongKU->unique()->numberBetween(100000, 999999), // Generate a unique six-digit number
                // 'created_at' => now(),
                // 'updated_at' => now(),
                'created_at' => Carbon::now()->locale('id_ID')->toDateTimeString(), // Set to the current local time in Indonesian locale
                'updated_at' => Carbon::now()->locale('id_ID')->toDateTimeString(), // Set to the current local time in Indonesian locale
            ];
        }
        //
        // Insert ProfileClinic data into the database
        ProfileClinic::insert($profileclinicna);
    }
}
