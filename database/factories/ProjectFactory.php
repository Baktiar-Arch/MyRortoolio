<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraphs(3, true),
            'tech_stack' => 'Laravel, Tailwind CSS, MySQL',
            'demo_url' => fake()->optional()->url(),
            'repo_url' => fake()->optional()->url(),
            'thumbnail' => null,
        ];
    }
}
