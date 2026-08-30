<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Languages',
                'slug' => Str::slug('Languages'),
            ],
            [
                'name' => 'Frontend',
                'slug' => Str::slug('Frontend'),
            ],
            [
                'name' => 'Backend',
                'slug' => Str::slug('Backend'),
            ],
            [
                'name' => 'Database',
                'slug' => Str::slug('Database'),
            ],
            [
                'name' => 'Tools',
                'slug' => Str::slug('Tools'),
            ],
            [
                'name' => 'Other',
                'slug' => Str::slug('Other'),
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
