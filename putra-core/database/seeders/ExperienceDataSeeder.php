<?php

namespace Database\Seeders;

use App\Models\ExperienceData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'user_id' => 1,
                'position' => 'Software Engineer',
                'company' => 'Dinas Kominfo Mandailing Natal',
                'description_id' => 'Bertanggung jawab dalam pengembangan dan pemeliharaan aplikasi web menggunakan Laravel, Vue.js, dan MySQL. Berkolaborasi dengan tim untuk merancang solusi yang efisien dan skalabel.',
                'description_en' => 'Responsible for developing and maintaining web applications using Laravel, Vue.js, and MySQL. Collaborated with the team to design efficient and scalable solutions.',
                'location' => 'Sumatera Uatara, Indonesia',
                'start_date' => '2025-01-01',
                'end_date' => null,
                'image' => null,
            ],
        ];

        foreach ($experiences as $experience) {
            ExperienceData::create($experience);
        }
    }
}
