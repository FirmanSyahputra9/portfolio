<?php

namespace Database\Seeders;

use App\Models\EducationData;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::first()->id;

        $educationData = [
            [
                'user_id' => $userId,
                'institution_id' => 'SMA Negeri 2 Plus Panyabungan',
                'institution_en' => 'SMA Negeri 2 Plus Panyabungan',
                'degree' => 'IPA',
                'field_of_study_id' => 'IPA',
                'field_of_study_en' => 'IPA',
                'final_grade' => '97',
                'description_id' => 'Saya lulus dari SMA Negeri 2 Plus Panyabungan dengan nilai 97.',
                'description_en' => 'I graduated from SMA Negeri 2 Plus Panyabungan with a grade of 97.',
                'location' => 'Panyabungan',
                'start_date' => '2019-07-01',
                'end_date' => '2022-05-06',
                'image' => null

            ],
            [
                'user_id' => $userId,
                'institution_id' => 'Universitas Sumatera Utara',
                'institution_en' => 'University of Sumatera Utara',
                'degree' => 'D3',
                'field_of_study_id' => 'Teknik Informatika',
                'field_of_study_en' => 'Informatic Engineering',
                'final_grade' => '3.85',
                'description_id' => 'Saya lulus dari Universitas Sumatera Utara dengan IPK 3.85.',
                'description_en' => 'I graduated from University of Sumatera Utara with an IPK of 3.85.',
                'location' => 'Medan',
                'start_date' => '2023-06-29',
                'end_date' => '2026-06-23',
                'image' => null
            ]
        ];

        foreach ($educationData as $edu) {
            EducationData::create($edu);
        }
    }
}
