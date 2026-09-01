<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Issuer;
use Illuminate\Support\Str;

class IssuerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issuer = [
            [
                'name' => 'MongoDB University',
                'slug' => Str::slug('mongodb-university'),
                'logo' => 'https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://coursera-instructor-photos.s3.amazonaws.com/b9/9b3af01d614d18a4d39471abb25b55/Google-Play-Store-Banner_1920x960px.jpg',
                'url' => 'https://mongodb.com',
            ],
            [
                'name' => 'Google For Education',
                'slug' => Str::slug('google-for-education'),
                'logo' => 'https://static.wixstatic.com/media/863c21_4e7995db65f24f0aaf1d61b84565ed57~mv2.jpg/v1/fill/w_500,h_500,al_c,q_80/Logo%20for%20EMA%20(65).jpg',
                'url' => 'https://google.com',
            ],
            [
                'name' => 'Kementrian Ketenagakerjaan RI',
                'slug' => Str::slug('kementrian-ketenagakerjaan-ri'),
                'logo' => 'https://static.wixstatic.com/media/863c21_4e7995db65f24f0aaf1d61b84565ed57~mv2.jpg/v1/fill/w_500,h_500,al_c,q_80/Logo%20for%20EMA%20(65).jpg',
                'url' => 'https://kemenaker.go.id',
            ],
            [
                'name' => 'Dicoding',
                'slug' => Str::slug('dicoding'),
                'logo' => 'https://media.licdn.com/dms/image/v2/C560BAQHB5IJW-49lKw/company-logo_200_200/company-logo_200_200/0/1630650405272/dicodingacademy_logo?e=2147483647&v=beta&t=RfYxhBWG1we3Ay5UD4h6SBVeq0w1PTTv2SsBNIRpfYw',
                'url' => 'https://dicoding.com',
            ],
            [
                'name' => 'Udemy',
                'slug' => Str::slug('udemy'),
                'logo' => 'https://udemy.com',
                'url' => 'https://udemy.com',
            ]
        ];

        foreach ($issuer as $data) {
            Issuer::create($data);
        }
    }
}
