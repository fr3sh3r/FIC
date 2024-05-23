<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

use Illuminate\Support\Carbon;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a doctor schedule manually (static data)
        DoctorSchedule::create([
            'doctor_id' => 1,
            'day' => 'Rabu',
            'time' => '08:00-12:00'
        ]);

        $faker = Faker::create();
        $namahari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $keluhanKU = [
            'Cepat Lelah',
            'Penurunan Berat Badan',
            'Demam Berkepanjangan',
            'Sensitif Matahari',
            'Sakit Kepala',
            'Kejang',
            'Sakit Dada',
            'Keguguran',
            'Riwayat Thrombosis',
            'Kerontokan Rambut',
            'Luka Pada Mulut',
            'Ruam Pada Wajah',
            'Sesak Nafas',
            'Batuk Darah',
            'Diare Kronis',
            'Perut Kembung',
            'Pendarahan',
            'Sakit Perut',
            'Perut Kembung',
            'Perut Bengkak',
            'Mudah Memar',
            'Sulit Pipis',
            'Sulit Bab',
            'Konstipasi',
            'Kencing Darah',
            'Sakit Gigi',
            'Sariawan Akut',
            'Amandel',
            'Ambeien Parah',
            'Gangguan Hormon',
            'Darah Tinggi',
            'Gula Darah Naik',
            'Obesitas',
            'Gangguan Tiroid',
            'Hiperkalsemia',
            'Hipkalsemia',
            'Gondok',
            'Anemia',
            'Thalasemia',
            'Hemofilia',
            'Kelainan Sumsum Tulang',
            'Radang Usus',
            'Infeksi Saluran Kemih',
            'Batu Ginjal',
            'Kutu Air',
            'Panu',
            'Kurap',
            'Kalau Duit Habis, Mual2'
        ];



        // Auto generate doctor schedules
        // Doctor::all()->each(function ($doctor) use ($faker, $namahari) {
        //     DoctorSchedule::factory()->count(3)->create([
        //         //DoctorSchedule::factory(3)->create([
        //         //NGACO    factory(3) tanpa count membuat 3 data yang sama persis
        //         'doctor_id' => $doctor->id,
        //         'day' => $faker->randomElement($namahari),
        //         'time' => $faker->randomElement(['07:00-09:00', '08:00-10:00', '09:30-11:30', '11:00-12:00', '16:00-20:00', '16:00-18:00', '18:00-20:00']),
        //         'status' => 'Active', // Assuming default status is 'Active'
        //         'note' => $faker->sentence // Generating a random note
        //     ]);
        // });

        //Masih ada beberapa data jadwal yang sama persis
        // Doctor::all()->each(function ($doctor) use ($faker, $namahari) {
        //     $schedules = [];
        //     for ($i = 0; $i < 3; $i++) {
        //         $schedules[] = [
        //             'doctor_id' => $doctor->id,
        //             'day' => $faker->randomElement($namahari),
        //             'time' => $faker->randomElement(['07:00-09:00', '08:00-10:00', '09:30-11:30', '11:00-12:00', '16:00-20:00', '16:00-18:00', '18:00-20:00']),
        //             'status' => 'Active',
        //             'note' => $faker->sentence
        //         ];
        //     }
        //     DoctorSchedule::insert($schedules);
        // });

        //mencari jadwal yang unique
        // Doctor::all()->each(function ($doctor) use ($faker, $namahari) {
        //     $schedules = collect(); // Collect schedules to check for duplicates

        //     // Generate schedules until we have 3 unique ones
        //     while ($schedules->count() < 3) {
        //         $schedule = [
        //             'doctor_id' => $doctor->id,
        //             'day' => $faker->randomElement($namahari),
        //             'time' => $faker->randomElement(['07:00-09:00', '08:00-10:00', '09:30-11:30', '11:00-12:00', '16:00-20:00', '16:00-18:00', '18:00-20:00']),
        //             'status' => 'Active',
        //             'note' => $faker->sentence
        //         ];

        //         // Check if the generated schedule is unique
        //         if (!$schedules->contains($schedule)) {
        //             $schedules->push($schedule);
        //         }
        //     }

        //     // Insert the unique schedules into the database
        //     DoctorSchedule::insert($schedules->toArray());
        // });

        //pengen unik dan random jumlahnya, jangan selalu 3 baris
        //perfect
        Doctor::all()->each(function ($doctor) use ($faker, $namahari) {
            $numSchedules = rand(2, 5); // Generate a random number of schedules between 1 and 3
            $schedules = collect(); // Collect schedules to check for duplicates

            $catatanjadwaldokterKU = [
                'Harap konfirmasi jadwal ke aspri',
                'Jadwal dapat berubah sewaktu-waktu',
                'Jadwal diupdate di Instagram',
                'Konfirmasi via Whatsapp',
                'Tanya jadwal ke customer service',
                'Tetap praktek di tanggal merah',
                'Untuk informasi kehadiran dokter via Call Center',
                'Tidak pernah tolerir keterlambatan',
                'Sering terlambat jika ada tindakan',
                'Jika tanggal merah, jadwal menjadi keesokannya',
                'Dokter cuti 2 minggu sejak kemarin',
                'Jadwal bisa berubah sesuai perjanjian',
                'Dokter batal praktek karena ada keperluan',
                'Ada operasi memanjang',
            ];


            // Generate schedules until we have the desired number of unique ones
            while ($schedules->count() < $numSchedules) {
                $schedule = [
                    'doctor_id' => $doctor->id,
                    'day' => $faker->randomElement($namahari),
                    'time' => $faker->randomElement(['07:00-09:00',  '09:30-11:30', '12:00-14:00', '16:00-20:00', '16:00-18:00', '18:00-20:00']),
                    'status' => 'Active',
                    'note' => $faker->randomElement($catatanjadwaldokterKU),
                    // 'created_at' => now(), //pake now jadi waktu UTC / GMT
                    // 'updated_at' => now(),
                    'created_at' => Carbon::now()->locale('id_ID')->toDateTimeString(), // Set to the current local time in Indonesian locale
                    'updated_at' => Carbon::now()->locale('id_ID')->toDateTimeString(), // Set to the current local time in Indonesian locale
                ];

                // Check if the generated schedule is unique
                $isUnique = $schedules->where('doctor_id', $schedule['doctor_id'])
                    ->where('day', $schedule['day'])
                    ->where('time', $schedule['time'])
                    ->isEmpty();

                if ($isUnique) {
                    $schedules->push($schedule);
                }
            }

            // Insert the unique schedules into the database
            DoctorSchedule::insert($schedules->toArray());
        });
    }
}
