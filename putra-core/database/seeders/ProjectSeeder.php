<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'user_id' => User::first()->id,
                'title_id' => 'Proyek 1',
                'title_en' => 'Project 1',
                'introduction_id' => 'Ini adalah penjelasan singkat untuk Proyek 1.',
                'introduction_en' => 'This is the introduction for Project 1.',
                'demo' => 'https://example.com/demo1',
                'source_code' => 'https://github.com/username/project1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::first()->id,
                'title_id' => 'Proyek 2',
                'title_en' => 'Project 2',
                'introduction_id' => 'Ini adalah penjelasan singkat untuk Proyek 2.',
                'introduction_en' => 'This is the introduction for Project 2.',
                'demo' => 'https://example.com/demo2',
                'source_code' => 'https://github.com/username/project2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::first()->id,
                'title_id' => 'Proyek 3',
                'title_en' => 'Project 3',
                'introduction_id' => 'Ini adalah penjelasan singkat untuk Proyek 3.',
                'introduction_en' => 'This is the introduction for Project 3.',
                'demo' => 'https://example.com/demo3',
                'source_code' => 'https://github.com/username/project3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project::create($project);
        }
    }
}
