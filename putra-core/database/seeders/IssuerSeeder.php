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
                'logo' => 'https://mongodb.com',
                'url' => 'https://mongodb.com',
            ],
            [
                'name' => 'Google For Education',
                'slug' => Str::slug('google-for-education'),
                'logo' => 'https://google.com',
                'url' => 'https://google.com',
            ],
            [
                'name' => 'Kementrian Ketenagakerjaan RI',
                'slug' => Str::slug('kementrian-ketenagakerjaan-ri'),
                'logo' => 'https://kemenaker.go.id',
                'url' => 'https://kemenaker.go.id',
            ],
            [
                'name' => 'Dicoding',
                'slug' => Str::slug('dicoding'),
                'logo' => 'https://dicoding.com',
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
