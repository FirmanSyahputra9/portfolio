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
                'company' => 'PT. Putra Teknologi Indonesia',
                'description_id' => 'Bertanggung jawab dalam pengembangan dan pemeliharaan aplikasi web menggunakan Laravel, Vue.js, dan MySQL. Berkolaborasi dengan tim untuk merancang solusi yang efisien dan skalabel.',
                'description_en' => 'Responsible for developing and maintaining web applications using Laravel, Vue.js, and MySQL. Collaborated with the team to design efficient and scalable solutions.',
                'location' => 'Jakarta, Indonesia',
                'start_date' => '2022-01-01',
                'end_date' => null,
                'image' => null,
            ],
            [
                'user_id' => 1,
                'position' => 'Frontend Developer',
                'company' => 'PT. Putra Teknologi Indonesia',
                'description_id' => 'Bertanggung jawab dalam pengembangan antarmuka pengguna menggunakan Vue.js dan Tailwind CSS. Bekerja sama dengan desainer untuk menciptakan pengalaman pengguna yang menarik.',
                'description_en' => 'Responsible for developing user interfaces using Vue.js and Tailwind CSS. Collaborated with designers to create engaging user experiences.',
                'location' => 'Jakarta, Indonesia',
                'start_date' => '2020-06-01',
                'end_date' => '2021-12-31',
                'image' => null,
            ],
        ];

        foreach ($experiences as $experience) {
            ExperienceData::create($experience);
        }
    }
}
