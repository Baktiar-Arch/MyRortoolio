<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Informasi Pemilik Portofolio
    |--------------------------------------------------------------------------
    |
    | Nilai di bawah dipakai pada hero, about, footer, dan halaman kontak.
    | Bisa di-override lewat environment variable di file .env.
    |
    */

    'owner' => env('PORTFOLIO_OWNER', 'Your Name'),

    'role' => env('PORTFOLIO_ROLE', 'Full-Stack Laravel Developer'),

    'email' => env('PORTFOLIO_EMAIL', 'you@example.com'),

    'tagline' => env(
        'PORTFOLIO_TAGLINE',
        'Saya membangun aplikasi web yang cepat, rapi, dan mudah digunakan — fokus pada clean code dan pengalaman pengguna.'
    ),

    'about' => env(
        'PORTFOLIO_ABOUT',
        'Seorang developer yang bersemangat membangun produk digital. Saya berpengalaman membangun REST API, dashboard admin, dan website produksi dengan Laravel, Blade, dan Tailwind CSS. Saya senang menulis kode yang terbaca, ter-test, dan mudah dirawat.'
    ),

    'social' => [
        'github' => env('PORTFOLIO_GITHUB', 'https://github.com/yourusername'),
        'linkedin' => env('PORTFOLIO_LINKEDIN', 'https://linkedin.com/in/yourusername'),
        'instagram' => env('PORTFOLIO_INSTAGRAM', 'https://instagram.com/yourusername'),
    ],

];
