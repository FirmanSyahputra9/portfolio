<?php

namespace Database\Seeders;

use App\Models\HeroButton;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory(10)->create();
        HeroButton::insert([
            [
                'label_id' => 'Unduh CV',
                'label_en' => 'Download CV',
                'url' => '#',
                'action' => 'download',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label_id' => 'Lihat Skil Saya',
                'label_en' => 'See My Skills',
                'url' => '#skills',
                'action' => 'link',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label_id' => 'Lihat Proyek Saya',
                'label_en' => 'See My Projects',
                'url' => '#projects',
                'action' => 'link',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);



        $user = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $data = $user->heroData()->create([
            'user_id' => $user->id,
            'name_id' => 'Firman Syahputra',
            'name_en' => 'Firman Syahputra',
            'role_id' => 'Fullstack Developer',
            'role_en' => 'Fullstack Developer',
            'image' => 'https://img.magnific.com/vektor-gratis/ilustrasi-ikon-vektor-kartun-anak-laki-laki-keren-lucu-berpose-dabbing-konsep-ikon-mode-orang-terpencil_138676-5680.jpg?semt=ais_hybrid&w=740&q=80',
            'summary_id' => 'Saya seorang Fullstack Developer yang fokus pada pengembangan aplikasi Web.',
            'summary_en' => 'I am a Full-stack Developer focused on web application development.',
            'role_description_id' => 'Saya seorang Senior Software Engineer dengan passion untuk clean code, distributed systems, dan developer tooling. Selama satu dekade terakhir, saya bekerja dengan startup dan enterprise di berbagai bidang fintech, logistik, dan edtech. Saya percaya bahwa rekayasa perangkat lunak yang baik adalah perpaduan antara kesederhanaan, ketahanan, dan empati terhadap pengguna.',
            'role_description_en' => 'I am a Senior Software Engineer with a passion for clean code, distributed systems, and developer tooling. Over the past decade, I have worked with startups and enterprises across various domains including fintech, logistics, and edtech. I believe that good software engineering is a blend of simplicity, resilience, and empathy for the user.',
        ]);

        $this->call([
            IssuerSeeder::class,
            CategorySeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
            ProjectDetailSeeder::class,
            AboutDataSeeder::class,
            ExperienceDataSeeder::class,
            ExperienceDetailSeeder::class,
            ContactDataSeeder::class,
            ContactDetailSeeder::class,
            CertificateDataSeeder::class,
            CertificateDetailSeeder::class
        ]);
    }
}
