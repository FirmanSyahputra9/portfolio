<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CertificateData;
use App\Models\ExperienceData;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<ExperienceDetail>
 */
class CertificateDetailFactory extends Factory
{

    public function definition(): array
    {
        return [
            'certificate_id' => CertificateData::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'technology_id' => Technology::inRandomOrder()->first()->id,
        ];
    }
}
