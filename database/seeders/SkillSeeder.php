<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP 8', 'category' => 'Backend', 'level' => 90],
            ['name' => 'Laravel 11', 'category' => 'Backend', 'level' => 88],
            ['name' => 'REST API Design', 'category' => 'Backend', 'level' => 85],
            ['name' => 'MySQL / MariaDB', 'category' => 'Database', 'level' => 85],
            ['name' => 'Query Optimization', 'category' => 'Database', 'level' => 75],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 87],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'level' => 80],
            ['name' => 'Blade Templating', 'category' => 'Frontend', 'level' => 88],
            ['name' => 'Git & GitHub', 'category' => 'Tools', 'level' => 85],
            ['name' => 'Linux / CLI', 'category' => 'Tools', 'level' => 80],
            ['name' => 'Testing (PHPUnit)', 'category' => 'Tools', 'level' => 75],
            ['name' => 'Docker (dasar)', 'category' => 'DevOps', 'level' => 65],
        ];

        foreach ($skills as $skill) {
            Skill::query()->firstOrCreate(
                ['name' => $skill['name']],
                $skill,
            );
        }
    }
}
