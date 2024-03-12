<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //========= Table User ==========
        //seeder table user untuk membuat 10 data dummy
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //seeder data statis (tidak otomatis)
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'edi@fic15.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
             //jangan pakai bcrypt('password'), tapi HASH
             //seharusnya langsung otomatis keluar use Illuminate\Support\Facades\Hash; di atas tapi nyatanya tidak
            'phone' => '1234567890',
        ]);



        //===== table ProfileClinics
        //membuat 30 data dummy secara otomatis
        // \App\Models\ProfileClinic::factory(30)->create();

        //seeder profile_clinics manual
        //membuat data manual
        \App\Models\ProfileClinic::factory()->create([
            'name'=> 'Klinik Segar Bugar',
            'address' => 'Jl. Gatot Subroto no. 72 Jakarta',
            'phone' => '02155829122',
            'email' => 'service@klinik_segar_bugar.com',
            'doctor_name' => 'Dr. Richard Lee',
            'unique_code' => '123456',


        ]);

        //call untuk memanggil Class Seeders DoctorSeeder
        $this->call(DoctorSeeder::Class);

    }
}
