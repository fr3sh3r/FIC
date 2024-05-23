<?php

namespace Database\Seeders;

use App\Models\PatientSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PatientScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\PatientSchedule::factory(20)->create();

        $faker = Faker::create(); //

        $complaintsKU = [
            'Abses',
            'Jerawat',
            'Alergi',
            'Penyakit Alzheimer',
            'Anemia',
            'Angin duduk',
            'Radang usus buntu',
            'Radang sendi',
            'Asma',
            'Astigmatisme',
            'Kutu air',
            'Sakit punggung',
            'Berdarah',
            'Lepuh',
            'Bisul',
            'Bronkitis',
            'Memar',
            'Wabah pes',
            'Bulimia',
            'Benjol',
            'Luka bakar',
            'Kapalan',
            'Kanker',
            'Katarak',
            'Cacar air',
            'Kolera',
            'Pilek masuk angin',
            'Kolik',
            'Sembelit',
            'Mata ikan',
            'Penyakit jantung coroner',
            'Batuk',
            'Cacar sapi',
            'Kram',
            'Budek',
            'Dehidrasi',
            'Demam berdarah',
            'Diabetes',
            'Diare',
            'Difteri',
            'Anyang-anyangan',
            'Pusing',
            'Disentri',
            'Eksim',
            'Empisema',
            'Epilepsi (ayan)',
            'Kelelahan',
            'Demam',
            'Penyakit asam lambung',
            'Gonorea',
            'Encok',
            'Sakit kepala',
            'Serangan jantung',
            'Penyakit jantung',
            'Cacingan',
            'Wasir',
            'radang hati',
            'Burut',
            'Tekanan darah tinggi',
            'HIV',
            'Gangguan pencernaan',
            'Peradangan',
            'Influensa',
            'Intoleransi laktosa',
            'Kusta',
            'Leukemia',
            'Pincang',
            'Tekanan darah rendah',
            'Malaria',
            'Campak',
            'Meningitis',
            'Migrain',
            'Penyakit gondok',
            'Bisu',
            'Nyeri otot',
            'Mual',
            'Mimisan',
            'Obesitas',
            'Cantengan',
            'radang paru-paru',
            'Biang keringat',
            'Polio',
            'Rabies',
            'Ruam/bercak-bercak',
            'Reumatik',
            'Panu, kurap',
            'Skabies/kudis',
            'Skizofrenia',
            'Lecet',
            'Kejang',
            'Sakit/tidak enak badan',
            'Mual',
            'Pedih,perih',
            'Pegal, sakit',
            'Sakit tenggorokan',
            'Keseleo',
            'Sariawan',
            'Flu perut',
            'Sakit perut',
            'Radang tenggorokan',
            'Terbakar sinar matahari',
            'Pembengkakan',
            'Sipilis (raja singa)',
            'Talasemia',
            'Muntah',
            'Radang amandel',
            'Sakit gigi',
            'Tuberkulosis',
            'Tipus',
            'Maag',
            'meriang',
            'Biduran/gatal-gatal',
            'Kutil',
            'Kelurut',
            'Luka',
            'Demam kuning',
        ];

        //$randomComplaint = $complaintsKU[array_rand($complaintsKU)];
        // $complaintDetails = explode(':', $randomComplaint);

        // $illness = $complaintDetails[0];
        // $symptom = $complaintDetails[1];

        // echo "Illness: $illness\n";
        // echo "Symptom: $symptom\n";

        $patientschedulena = [];
        for ($i = 1; $i < 20; $i++) {

            $patientIdNa = $i; //($i % 20) + 1; // $i is between 0 and 29, so $patientId will be between 1 and 10
            $doctorIdNa = $i; //($i % 20) + 1; // $i is between 0 and 29, so $doctorId will be between 1 and 20

            // Generate a random number between 500 and 15000
            $randomPrice = rand(500, 15000);
            // Round the random number to the nearest multiple of 100 (dividing by 100)
            $roundedPrice = round($randomPrice / 100) * 100;
            // Multiply by 10000 to get the final total price
            $totalPriceNa = $roundedPrice * 100;



            $patientschedulena[] = [

                'patient_id' => $patientIdNa,
                'doctor_id' =>  $doctorIdNa,
                'schedule_time' => $faker->dateTimeBetween('now', '+1 month'),
                //'schedule_time' => $this->$faker->date('Y-m-d', '+1 month'), // Generate only the date
                'complaint' => $faker->randomElement($complaintsKU),
                'status' => 'waiting', //$faker->randomElement(['waiting', 'canceled']),
                'no_antrian' => 1,  //$i + 1,
                'payment_method' => NULL, //$faker->randomElement(['cash', 'qris']),
                'total_price' => $totalPriceNa,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // Insert patient schedule data into the database
        PatientSchedule::insert($patientschedulena);
    }
}
