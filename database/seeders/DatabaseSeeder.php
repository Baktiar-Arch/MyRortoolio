<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,
        ]);

        if (! Project::query()->exists()) {
            Project::query()->create([
                'title' => 'Sistem Informasi Kasir',
                'description' => 'Aplikasi kasir berbasis web untuk mencatat transaksi penjualan, '
                    .'manajemen stok produk, dan laporan harian. Dilengkapi dengan role admin '
                    .'dan kasir serta cetak struk.',
                'tech_stack' => 'Laravel 11, Tailwind CSS, Alpine.js, MySQL, DomPDF',
                'demo_url' => 'https://demo-example.test/kasir',
                'repo_url' => 'https://github.com/yourusername/si-kasir',
                'thumbnail' => null,
            ]);
        }

        if (! Skill::query()->exists()) {
            Skill::query()->createMany([
                ['name' => 'PHP', 'category' => 'Backend', 'level' => 90],
                ['name' => 'Laravel', 'category' => 'Backend', 'level' => 88],
                ['name' => 'MySQL', 'category' => 'Database', 'level' => 85],
                ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 87],
                ['name' => 'Alpine.js', 'category' => 'Frontend', 'level' => 80],
                ['name' => 'Git', 'category' => 'Tools', 'level' => 85],
            ]);
        }
    }
}
