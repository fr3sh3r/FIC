<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Doctor::create([
            'doctor_name' => "Dr Edi M",
            'doctor_specialist' => "Spesialis Happy",
            'doctor_phone' => "08112342211",
            'doctor_email' => "edi@dokterhappy.com",
            'sip' => "1234",
            'id_ihs' => "iniKodeIHS22"
        ]);
        //===== table Doctor (lihat di Models)
        //membuat 30 data dummy secara otomatis
        \App\Models\Doctor::factory(30)->create();
    }
}
