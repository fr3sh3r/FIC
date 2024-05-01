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
            'Abscess:Abses',
            'Acne:Jerawat',
            'Allergy:Alergi',
            'Alzheimer disease:Penyakit Alzheimer',
            'Anemia:Anemia',
            'Angina pectoris:Angin duduk',
            'Appendicitis:Radang usus buntu',
            'Arthritis:Radang sendi',
            'Asthma:Asma',
            'Astigmatism:Astigmatisme',
            'Athlete\'s foot:Kutu air',
            'Backache:Sakit punggung',
            'Bleed:Berdarah',
            'Blister:Lepuh',
            'Boil:Bisul',
            'Bronchitis:Bronkitis',
            'Bruise:Memar',
            'Bubonic plague:Wabah pes',
            'Bulimia:Bulimia',
            'Bump:Benjol',
            'Burns:Luka bakar',
            'Callus:Kapalan',
            'Cancer:Kanker',
            'Cataract:Katarak',
            'Chickenpox:Cacar air',
            'Cholera:Kolera',
            'Cold:Pilek masuk angin',
            'Colic:Kolik',
            'Constipation:Sembelit',
            'Corn/clavus:Mata ikan',
            'Coronary heart disease:Penyakit jantung coroner',
            'Cough:Batuk',
            'Cowpox:Cacar sapi',
            'Cramps:Kram',
            'Loss hearing:Budek',
            'Dehydration:Dehidrasi',
            'Dengue fever:Demam berdarah',
            'Diabetes:Diabetes',
            'Diarrhea:Diare',
            'Diphtheria:Difteri',
            'Dysuria:Anyang-anyangan',
            'Dizziness:Pusing',
            'Dysentery:Disentri',
            'Eczema:Eksim',
            'Emphysema:Empisema',
            'Epilepsy:Epilepsi (ayan)',
            'Fatigue:Kelelahan',
            'Fever:Demam',
            'GERD /acid reflux:Penyakit asam lambung',
            'Gonorrhea:Gonorea',
            'Gout:Encok',
            'Headache:Sakit kepala',
            'Heart attack:Serangan jantung',
            'Heart disease:Penyakit jantung',
            'Helminthiasis/worm infection:Cacingan',
            'Hemorrhoids:Wasir',
            'Hepatitis:radang hati',
            'Hernia:Burut',
            'High blood pressure:Tekanan darah tinggi',
            'HIV (Human Immunodeficiency Virus):HIV',
            'Indigestion:Gangguan pencernaan',
            'Inflammation:Peradangan',
            'Influenza:Influensa',
            'Lactose intolerant:Intoleransi laktosa',
            'Leprosy:Kusta',
            'Leukemia:Leukemia',
            'Limp:Pincang',
            'Low blood pressure:Tekanan darah rendah',
            'Malaria:Malaria',
            'Measles:Campak',
            'Meningitis:Meningitis',
            'Migraine:Migrain',
            'Mumps:Penyakit gondok',
            'Mute:Bisu',
            'Myalgia/muscle pain:Nyeri otot',
            'Nausea:Mual',
            'Nosebleed:Mimisan',
            'Obesity:Obesitas (kegemukan)',
            'Paronychia:Cantengan',
            'Pneumonia:radang paru-paru',
            'Prickly heat:Biang keringat',
            'Polio:Polio',
            'Rabies:Rabies',
            'Rash:Ruam/bercak-bercak',
            'Rheumatism:Reumatik',
            'Ringworm:Panu, kurap',
            'Scabies:Skabies/kudis',
            'Schizophrenia:Skizofrenia',
            'Scuffled:Lecet',
            'Seizure:Kejang',
            'Sick:Sakit/tidak enak badan',
            'Sickness:Mual',
            'Smarting/stings:Pedih,perih',
            'Sore/stiff:Pegal, sakit',
            'Sore Throat:Sakit tenggorokan',
            'Sprain:Keseleo',
            'Sprue:Sariawan',
            'Stomach flu:Flu perut',
            'Stomachache:Sakit perut',
            'Strep throat:Radang tenggorokan',
            'Sunburn:Terbakar sinar matahari',
            'Swelling:Pembengkakan',
            'Syphilis:Sipilis (raja singa)',
            'Thalassaemia:Talasemia',
            'Throw-up/vomit:Muntah',
            'Tonsillitis:Radang amandel',
            'Toothache:Sakit gigi',
            'Tuberculosis:Tuberkulosis',
            'Typhus:Tipus',
            'Ulcer:Maag',
            'Unwell:meriang',
            'Urticaria/hives/itch:Biduran/gatal-gatal',
            'Warts:Kutil',
            'Whitlow:Kelurut',
            'Wound/scar/cut:Luka',
            'Yellow fever:Demam kuning',
        ];

        //$randomComplaint = $complaintsKU[array_rand($complaintsKU)];
        // $complaintDetails = explode(':', $randomComplaint);

        // $illness = $complaintDetails[0];
        // $symptom = $complaintDetails[1];

        // echo "Illness: $illness\n";
        // echo "Symptom: $symptom\n";

        $patientschedulena = [];
        for ($i = 0; $i < 30; $i++) {

            $patientIdNa = ($i % 20) + 1; // $i is between 0 and 29, so $patientId will be between 1 and 10
            $doctorIdNa = ($i % 20) + 1; // $i is between 0 and 29, so $doctorId will be between 1 and 20

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
                'complaint' => $faker->randomElement($complaintsKU),
                'status' => $faker->randomElement(['waiting', 'canceled']),
                'no_antrian' => $i + 1,
                'payment_method' => $faker->randomElement(['cash', 'qris']),
                'total_price' => $totalPriceNa,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // Insert patient schedule data into the database
        PatientSchedule::insert($patientschedulena);
    }
}
