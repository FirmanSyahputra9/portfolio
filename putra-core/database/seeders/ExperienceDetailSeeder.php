<?php

namespace Database\Seeders;

use App\Models\ExperienceDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExperienceDetail::factory()->count(10)->create();
    }
}
