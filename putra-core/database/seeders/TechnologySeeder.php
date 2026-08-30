<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
                'icon' => 'fab fa-php',
            ],
            [
                'name' => 'Python',
                'slug' => Str::slug('Python'),
                'icon' => 'fab fa-python',
            ],
            [
                'name' => 'react',
                'slug' => Str::slug('react'),
                'icon' => 'fab fa-react'
            ],
            [
                'name' => 'livewire',
                'slug' => Str::slug('livewire'),
                'icon' => 'fab fa-laravel',
            ],
            [
                'name' => 'tailwind',
                'slug' => Str::slug('tailwind'),
                'icon' => 'fab fa-css3-alt',
            ],
            [
                'name' => 'alpinejs',
                'slug' => Str::slug('alpinejs'),
                'icon' => 'fab fa-js',
            ],
            [
                'name' => 'laravel',
                'slug' => Str::slug('laravel'),
                'icon' => 'fab fa-laravel',
            ],
            [
                'name' => 'codeigniter',
                'slug' => Str::slug('codeigniter'),
                'icon' => 'fab fa-codeigniter',
            ],
            [
                'name' => 'nodejs',
                'slug' => Str::slug('nodejs'),
                'icon' => 'fab fa-node-js',
            ],
            [
                'name' => 'mysql',
                'slug' => Str::slug('mysql'),
                'icon' => 'fas fa-database',
            ],
            [
                'name' => 'mongodb',
                'slug' => Str::slug('mongodb'),
                'icon' => 'fas fa-database',
            ],
            [
                'name' => 'git',
                'slug' => Str::slug('git'),
                'icon' => 'fab fa-git'
            ],
            [
                'name' => 'docker',
                'slug' => Str::slug('docker'),
                'icon' => 'fab fa-docker',
            ],

        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}


