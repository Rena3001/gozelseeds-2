<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'image' => 'projects/projects-v1-img1.jpg',
            'category' => 'Agriculture',
            'is_active' => true,
            'order' => 1,
        ]);

        $project->translations()->createMany([
            ['locale' => 'en', 'title' => 'Harvest Innovations'],
            ['locale' => 'az', 'title' => 'Məhsul Yenilikləri'],
            ['locale' => 'ru', 'title' => 'Инновации урожая'],
        ]);
    }
}
