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
        Project::factory(5)->create([
            'name' => fake()->name(),
            'description' => fake()->paragraph(100),
            'stack' => fake()->text(20),
            'image' => fake()->imageUrl(),
            'link_project' => fake()->url()
        ]);
    }
}
