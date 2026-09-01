<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ProjectData;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<ProjectDetail>
 */
class ProjectDetailFactory extends Factory
{

    public function definition(): array
    {
        return [
            'project_id' => ProjectData::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'technology_id' => Technology::inRandomOrder()->first()->id,
        ];
    }
}
