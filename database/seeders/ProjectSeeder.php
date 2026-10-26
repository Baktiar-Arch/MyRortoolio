<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Informasi Kasir',
                'description' => 'Aplikasi kasir berbasis web untuk mencatat transaksi penjualan, '
                    .'manajemen stok produk, dan laporan harian. Dilengkapi dengan role admin '
                    .'dan kasir serta fitur cetak struk PDF. Dibangun dengan arsitektur service '
                    .'layer agar mudah dikembangkan.',
                'tech_stack' => 'Laravel 11, Tailwind CSS, Alpine.js, MySQL, DomPDF',
                'demo_url' => 'https://demo-example.test/kasir',
                'repo_url' => 'https://github.com/yourusername/si-kasir',
                'thumbnail' => null,
            ],
            [
                'title' => 'Portal Berita Laravel',
                'description' => 'Website portal berita dengan multi-kategori, pencarian full-text, '
                    .'dan panel redaktur. Mendukung unggah gambar, penjadwalan publikasi artikel, '
                    .'serta cache untuk mempercepat halaman depan.',
                'tech_stack' => 'Laravel 11, Blade, Tailwind CSS, MySQL, Redis',
                'demo_url' => null,
                'repo_url' => 'https://github.com/yourusername/portal-berita',
                'thumbnail' => null,
            ],
            [
                'title' => 'Aplikasi Absensi QR',
                'description' => 'Sistem absensi karyawan/pegawai menggunakan QR code unik per '
                    .'pengguna. Termasuk dashboard monitoring kehadiran real-time, export laporan '
                    .'Excel bulanan, dan notifikasi email keterlambatan.',
                'tech_stack' => 'Laravel 11, Livewire, Tailwind CSS, MySQL, Maatwebsite Excel',
                'demo_url' => 'https://demo-example.test/absensi',
                'repo_url' => 'https://github.com/yourusername/absensi-qr',
                'thumbnail' => null,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->firstOrCreate(
                ['title' => $project['title']],
                $project,
            );
        }
    }
}
