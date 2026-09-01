<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectData;

class ProjectDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'user_id' => User::first()->id,
                'title_id' => 'YT Downloader',
                'title_en' => 'YT Downloader',
                'introduction_id' => 'Solusi sederhana untuk manajemen unduhan media YouTube. Aplikasi web modern berbasis Node.js yang memanfaatkan kekuatan yt-dlp untuk memberikan pengalaman mengunduh video atau audio yang mulus. Mendukung unduhan video tunggal maupun playlist dengan informasi metadata yang lengkap.',
                'introduction_en' => 'A simple solution for managing YouTube media downloads. A modern Node.js-based web application that leverages the power of yt-dlp to provide a seamless video or audio downloading experience. It supports downloading both individual videos and playlists, complete with full metadata.',
                'source_code' => 'https://github.com/FirmanSyahputra9/YT-Downloader-Node.js',
                'image' => fake()->imageUrl(),
                'start_date' => '2026-02-10',
                'completed_at' => '2026-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($projects as $project) {
            ProjectData::create($project);
        }
    }
}
