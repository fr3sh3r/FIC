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
        //===== table Doctor (lihat di Models)
        //membuat 30 data dummy secara otomatis
        \App\Models\Doctor::factory(30)->create();
    }
}
