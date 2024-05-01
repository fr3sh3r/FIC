<?php

namespace Database\Seeders;

use App\Models\ServiceMedicines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Faker\Factory as Faker;

class ServiceMedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ////  Create 50 Service Medicine using Factory
        //  \App\Models\ServiceMedicines::factory(50)->create();

        $faker = Faker::create();

        $namaObatKU = [
            'Acyclovir 200 mg',
            'Acyclovir 400 mg',
            'Acyclovir Cream',
            'Allopurinol 100 mg',
            'Ambeven',
            'Ambroxol 1mg/ml',
            'Ambroxol mg',
            'Amlodipin 10 mg',
            'Amlodipin 20 mg',
            'Amoxicilin 500 mg',
            'Amoxicillin 12mg/ml',
            'Antasida Doen',
            'Antasida Doen Syrup',
            'Arkavit',
            'Asam Mefenamat 500 mg',
            'Asam Tranexamat 500 mg',
            'Bedak Salicil',
            'Betahistin 6 mg',
            'Betametason 0,%',
            'Betominplex',
            'Bisacodyl',
            'Captopril 12 mg',
            'Captopril 25 mg',
            'Captopril 50 mg',
            'Cazetin Dropsdrops',
            'Cefadroxil 12 mg',
            'Cefadroxil 500 mg',
            'Cendo Lyteers Minidose',
            'Cendo Xitrol Minidose',
            'Cetirizine 10 mg'
        ];

        $NamaPenyakitPerawatanKU = [
            'Kejang demam',
            'Tetanus',
            'HIV AIDS ',
            'Tension headache',
            'Migren',
            'Bell\'s Palsy',
            'Vertigo',
            'Gangguan somatoform',
            'Insomnia',
            'Benda asing di konjungtiva',
            'Konjungtivitis',
            'Perdarahan subkonjungtiva',
            'Mata kering',
            'Blefaritis',
            'Hordeolum',
            'Trikiasis',
            'Episkleritis',
            'Hipermetropia ringan',
            'Miopia ringan',
            'Astigmatism ringan',
            'Presbiopia',
            'Buta senja',
            'Otitis eksterna',
            'Otitis Media Akut',
            'Serumen prop',
            'Mabuk perjalanan',
            'Furunkel pada hidung',
            'Rhinitis akut',
            'Rhinitis alergika',
            'Rhinitis vasomotor',
            'Benda asing',
            'Epistaksis',
            'Influenza',
            'Pertusis',
            'Faringitis',
            'Tonsilitis',
            'Laringitis',
            'Asma bronchiale',
            'Bronchitis akut',
            'Pneumonia, bronkopneumonia',
            'Tuberkulosis paru ',
            'Hipertensi esensial',
            'Kandidiasis mulut',
            'Ulcus mulut',
            'Parotitis',
            'Infeksi pada umbilikus',
            'Gastritis',
            'Gastroenteritis',
            'Refluks gastroesofagus',
            'Demam tifoid',
            'Intoleransi makanan',
            'Alergi makanan',
            'Keracunan makanan',
            'Penyakit cacing tambang',
            'Strongiloidiasis',
            'Askariasis',
            'Skistosomiasis',
            'Taeniasis',
            'Hepatitis A',
            'Disentri basiler, disentri amuba',
            'Hemoroid grade ½',
            'Infeksi saluran kemih',
            'Gonore',
            'Pielonefritis ',
            'Fimosis',
            'Parafimosis',
            'Infeksi saluran kemih',
            'Vulvitis',
            'Vaginitis',
            'Vaginosis bakterialis',
            'Salphingitis',
            'Kehamilan normal',
            'Aborsi spontan komplet',
            'Anemia defisiensi besi pada kehamilan',
            'Ruptur perineum tingkat ½',
            'Abses folikel rambut/kelj sebasea',
            'Mastitis',
            'Cracked nipple',
            'Inverted nipple',
            'Diabetes melitus tipe 1',
            'Diabetes melitus tipe 2',
            'Hipoglikemi ringan',
            'Malnutrisi energi protein',
            'Defisiensi vitamin',
            'Defisiensi mineral',
            'Dislipidemia',
            'Hiperurisemia',
            'Obesitas',
            'Anemia defiensi besi',
            'Limphadenitis',
            'Demam dengue, DHF',
            'Malaria',
            'Leptospirosis',
            'Reaksi anafilaktik',
            'Ulkus pada tungkai',
            'Lipoma',
            'Veruka vulgaris',
            'Moluskum kontangiosum',
            'Herpes zoster',
            'Morbili',
            'Varicella',
            'Herpes simpleks',
            'Impetigo',
            'Impetigo ulceratif (ektima)',
            'Folikulitis superfisialis',
            'Furunkel, karbunkel',
            'Eritrasma',
            'Erisipelas',
            'Skrofuloderma',
            'Lepra',
            'Sifilis stadium 1 dan 2',
            'Tinea kapitis',
            'Tinea barbe',
            'Tinea facialis',
            'Tinea corporis',
            'Tinea manus',
            'Tinea unguium',
            'Tinea cruris',
            'Tinea pedis',
            'Pitiriasis versicolor',
            'Candidiasis mucocutan ringan',
            'Cutaneus larvamigran',
            'Filariasis',
            'Pedikulosis kapitis',
            'Pediculosis pubis',
            'Scabies',
            'Reaksi gigitan serangga',
            'Dermatitis kontak iritan',
            'Dermatitis atopik',
            'Dermatitis numularis',
            'Napkin ekzema',
            'Dermatitis seboroik',
            'Pitiriasis rosea',
            'Acne vulgaris ringan',
            'Hidradenitis supuratif',
            'Dermatitis perioral',
            'Miliaria',
            'Urtikaria akut',
            'Eksantemapous drug eruption',
            'Vulnus laseraum, puctum',
            'Luka bakar derajat 1 dan 2'
        ];

        $namapenyakitKonsultasiKU = [
            'Alergi',
            'Diabetes',
            'Kulit dan kelamin',
            'Gizi',
            'Kanker',
            'Kebidanan dan kandungan',
            'Gigi dan mulut',
            'Mata',
            'Seksualitas',
            'Telinga-hidung-tenggorok',
            'Tulang',
            'Kolesterol',
            'Jantung',
            'Flu',
            'Ginjal dan hati',
            'Virus',
            'Infeksi',
            'Psikologis',
            'Cedera luar'
        ];

        $serpis = [];
        for ($i = 1; $i <= 100; $i++) {
            switch ($i % 4) {
                case 0:
                    $name = $faker->randomElement($NamaPenyakitPerawatanKU);
                    $category = 'Treatment';
                    break;
                case 1:
                    $name = $faker->randomElement($namaObatKU);
                    $category = 'Medicine';  //ada kesalahan di sini misal pakai s sendangkan TablePlusfieldname tidak ada s akan error
                    break;
                case 2:
                    $name = $faker->randomElement($namapenyakitKonsultasiKU);
                    $category = 'Consultation';
                    break;
                case 3:
                    $name = $faker->randomElement($NamaPenyakitPerawatanKU);
                    $category = 'Treatment';
                    break;
            }

            $serpis[] = [
                'name' => $name,
                'category' => $category,
                'price' => $faker->randomFloat(2, 100000, 3000000.00),
                'quantity' => $faker->randomNumber(1, 999),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert Service Medicines data into the database
        ServiceMedicines::insert($serpis);
    }
}
