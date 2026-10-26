<?php

return [
    'owner' => env('PORTFOLIO_OWNER', 'Ahmad Rapli'),
    'role' => env('PORTFOLIO_ROLE', 'Software Engineer | Laravel, MySQL & REST API'),
    'email' => env('PORTFOLIO_EMAIL', 'ahmad@example.com'),
    'about' => env('PORTFOLIO_ABOUT', 'Software Engineer fokus pada Laravel, MySQL, dan perancangan REST API. Membangun sistem backend yang terstruktur untuk kebutuhan bisnis nyata.'),
    'location' => env('PORTFOLIO_LOCATION', 'Indonesia'),
    'cv_path' => env('PORTFOLIO_CV_PATH'),
    'socials' => [
        'github' => env('PORTFOLIO_GITHUB', 'https://github.com/artfulabysswalker'),
        'linkedin' => env('PORTFOLIO_LINKEDIN', 'https://linkedin.com/in/ahmadrapli'),
        'instagram' => env('PORTFOLIO_INSTAGRAM', null),
    ],
];
