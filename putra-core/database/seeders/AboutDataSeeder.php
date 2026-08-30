<?php

namespace Database\Seeders;

use App\Models\AboutData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutData = [
            [
                'user_id' => 1,
                'about_description_en' => 'Saya seorang Senior Software Engineer dengan passion untuk clean code, distributed systems, dan developer tooling. Selama satu dekade terakhir, saya bekerja dengan startup dan enterprise di berbagai bidang fintech, logistik, dan edtech.
                Saya percaya bahwa rekayasa perangkat lunak yang baik adalah perpaduan antara kesederhanaan, ketahanan, dan empati terhadap pengguna.',
                'about_description_en' => 'I\'m a Senior Software Engineer with a passion for clean code, distributed systems, and developer tooling. Over the last decade, I\'ve worked with startups and enterprises across fintech, logistics, and edtech.
                I believe great engineering is a blend of simplicity, robustness, and empathy for the people using the software. I lead teams, mentor juniors, and still get my hands dirty with code every day.
                When I\'m not building, I write about system design, contribute to open source, and tinker with embedded systems.',
                'about_description_id' => 'Saya seorang Senior Software Engineer dengan passion untuk clean code, distributed systems, dan developer tooling. Selama satu dekade terakhir, saya bekerja dengan startup dan enterprise di berbagai bidang fintech, logistik, dan edtech.
                Saya percaya bahwa rekayasa perangkat lunak yang baik adalah perpaduan antara kesederhanaan, ketahanan, dan empati terhadap pengguna. Saya memimpin tim, membimbing junior, dan masih tetap menulis kode setiap hari.
                Ketika saya tidak membangun, saya menulis tentang desain sistem, berkontribusi pada open source, dan bermain-main dengan sistem embedded.',
            ],
        ];

        foreach ($aboutData as $data) {
            AboutData::create($data);
        }
    }
}
