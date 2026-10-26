# Personal Portfolio Website — Laravel 11

Website portofolio pribadi yang profesional, responsif (mobile-first), dan mudah dikustomisasi. Dibangun dengan **Laravel 11**, **Blade**, **Tailwind CSS**, **Alpine.js**, dan **MySQL 8**.

## Fitur

- Halaman utama single-page: Hero, About, Skills, Projects, Contact
- Data Skills & Projects dari database (MySQL), dikelompokkan per kategori
- Detail proyek (`/projects/{project}`) dengan route model binding
- Form kontak dengan validasi Form Request + penyimpanan ke tabel `contact_messages`
- Flash message sukses (auto-hide dengan Alpine.js)
- Dark mode toggle (Alpine.js + `localStorage`, tanpa FOUC)
- Smooth scroll + scroll-padding untuk navbar fixed
- Mobile menu hamburger (Alpine.js)
- Animasi ringan saat section muncul (Intersection Observer)
- Admin panel (autentikasi Breeze): CRUD Proyek, Skill, dan inbox Pesan
- Komponen Blade: `x-project-card`, `x-skill-badge`
- Layout: `layouts/app.blade.php` (publik), `layouts/admin.blade.php` (admin), partial `navbar` & `footer`

## Prasyarat

| Tool       | Versi   |
|------------|---------|
| PHP        | 8.2+    |
| Composer   | 2.x     |
| Node.js    | 18+     |
| npm        | 9+      |
| MySQL      | 8 (atau MariaDB 10.4+) |

## Langkah Instalasi

```bash
# 1. Install dependency PHP
composer install

# 2. Install dependency JS (Tailwind + Alpine via Vite)
npm install

# 3. Salin environment file
cp .env.example .env

# 4. Buat database MySQL (via mysql CLI atau phpMyAdmin)
mysql -u root -p -e "CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 5. Sesuaikan kredensial DB di .env
#    DB_CONNECTION=mysql
#    DB_HOST=127.0.0.1
#    DB_PORT=3306
#    DB_DATABASE=portfolio_db
#    DB_USERNAME=root
#    DB_PASSWORD=

# 6. Generate application key
php artisan key:generate

# 7. Jalankan migrasi + seeder data contoh
php artisan migrate --seed

# 8. Build aset CSS/JS
npm run dev          # untuk pengembangan (hot reload)
# atau
npm run build        # untuk produksi

# 9. Jalankan server
php artisan serve
```

Buka <http://localhost:8000>.

### Login Admin

Seeder membuat akun admin:

| Field    | Value                |
|----------|----------------------|
| Email    | `admin@portfolio.test` |
| Password | `password`           |

Setelah login, akses panel di **<http://localhost:8000/dashboard>** untuk mengelola Proyek, Skill, dan membaca Pesan masuk.

> Ganti password admin sebelum deploy ke produksi (menu Profile, atau `php artisan tinker` → `App\Models\User::where('email','admin@portfolio.test')->update(['password' => Hash::make('rahasia')])`).

## Cara Mengganti Data Pribadi

### 1. Melalui `.env` (cepat)

```env
PORTFOLIO_OWNER="Nama Anda"
PORTFOLIO_ROLE="Full-Stack Laravel Developer"
PORTFOLIO_EMAIL="email@anda.com"
PORTFOLIO_TAGLINE="Kalimat pembuka di hero."
PORTFOLIO_ABOUT="Paragraf tentang Anda di section About."
PORTFOLIO_GITHUB="https://github.com/username"
PORTFOLIO_LINKEDIN="https://linkedin.com/in/username"
PORTFOLIO_INSTAGRAM="https://instagram.com/username"
```

Nilai-nilai ini dibaca di `config/portfolio.php`.

### 2. Melalui Admin Panel

- **Proyek & Skill**: login → Dashboard → kelola (tambah/edit/hapus).
- **Pesan kontak**: tersimpan otomatis di tabel `contact_messages`, terlihat di menu Pesan.

### 3. Melalui Seeder / Tinker

Edit `database/seeders/ProjectSeeder.php` dan `SkillSeeder.php`, lalu:

```bash
php artisan migrate:fresh --seed
```

Atau tanpa reset (via tinker):

```bash
php artisan tinker
>>> App\Models\Project::create(['title'=>'Judul','description'=>'Deskripsi','tech_stack'=>'Laravel, MySQL']);
>>> App\Models\Skill::create(['name'=>'Laravel','category'=>'Backend','level'=>90]);
```

## Struktur Penting

```
app/
├── Http/Controllers/
│   ├── PortfolioController.php      # Halaman publik (index + detail)
│   ├── ContactController.php        # Simpan pesan kontak
│   └── Admin/                       # CRUD admin (Project, Skill, Message, Dashboard)
├── Http/Requests/
│   ├── StoreContactMessageRequest.php
│   ├── SaveProjectRequest.php
│   └── SaveSkillRequest.php
├── Models/
│   ├── Project.php
│   ├── Skill.php
│   └── ContactMessage.php
config/
└── portfolio.php                    # Data diri portofolio
database/
├── migrations/                      # projects, skills, contact_messages
└── seeders/                         # Data contoh + akun admin
resources/views/
├── layouts/app.blade.php            # Layout publik (dark mode, Alpine)
├── layouts/admin.blade.php          # Layout admin (Breeze)
├── partials/navbar.blade.php        # Navbar + hamburger + dark toggle
├── partials/footer.blade.php
├── components/project-card.blade.php
├── components/skill-badge.blade.php
├── portfolio/index.blade.php        # Single page: hero/about/skills/projects/contact
├── portfolio/show.blade.php         # Detail proyek
└── admin/                           # Views CRUD admin
routes/web.php
```

## Alur Aplikasi (ringkas)

1. **Publik** — `GET /` → `PortfolioController@index` mengambil `Project` + `Skill` (dikelompokkan per kategori) → render `portfolio/index.blade.php` (single page dengan anchor `#home #about #skills #projects #contact`).
2. **Detail proyek** — `GET /projects/{project}` → route model binding → `portfolio/show.blade.php` (+ 3 proyek terkait).
3. **Kontak** — `POST /contact` → `StoreContactMessageRequest` memvalidasi → simpan ke `contact_messages` → redirect back + flash sukses.
4. **Admin** — `GET /dashboard` dan `/admin/*` dilindungi middleware `auth` (Breeze). CRUD Proyek/Skill memakai Form Request `SaveProjectRequest`/`SaveSkillRequest`; pesan kontak tampil di inbox dan bisa dihapus.

## Deploy

### A. Shared Hosting (cPanel)

1. Build aset di lokal: `npm run build` → unggah seluruh folder (termasuk `public/build/`).
2. Upload isi folder proyek ke `public_html` **atau** taruh project di luar `public_html` dan arahkan `public/` sebagai document root.
3. Di cPanel > MySQL Databases: buat database `portfolio_db` + user, grant ALL.
4. Impor `database/migrations` lewat phpMyAdmin, atau jalankan migrasi via SSH:
   ```bash
   php artisan migrate --seed --force
   ```
5. Set `.env`:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://domainanda.com
   DB_DATABASE=portfolio_db
   DB_USERNAME=user_anda
   DB_PASSWORD=password_anda
   SESSION_DRIVER=file          # jika database session tidak tersedia
   CACHE_STORE=file
   ```
6. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
7. Pastikan `.env` dan `storage/` **tidak** bisa diakses publik.

### B. VPS (Ubuntu/Debian + Nginx atau Apache)

```bash
# install PHP 8.2+, Composer, MySQL 8, Node
sudo apt update && sudo apt install php8.2-fpm php8.2-mysql composer mysql-server nodejs npm -y

# clone project, lalu ikuti Langkah Instalasi di atas (npm run build, bukan dev)

# point document root ke folder public/ (contoh Nginx):
#   root /var/www/portfolio/public;
#   index index.php;
#   try_files $uri $uri/ /index.php?$query_string;

sudo systemctl restart php8.2-fpm nginx
```

Gunakan Supervisor atau systemd untuk `php artisan queue:work` bila dipakai, dan Let's Encrypt untuk SSL.

### C. Railway / Render + MySQL terkelola

**Railway:**

1. Push repo ke GitHub → New Project → Deploy from repo (template Laravel/PHP).
2. Tambah plugin **MySQL** di project yang sama → Railway otomatis set `DATABASE_URL`.
3. Set environment variables: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://app.up.railway.app`, `SESSION_DRIVER=cache`, `CACHE_STORE=database` (atau Redis).
4. Build command: `composer install --no-dev && npm ci && npm run build && php artisan migrate --force`
5. Start command: `php artisan serve --host=0.0.0.0 --port=$PORT` (atau pakai Nixpacks config `php artisan serve`).

**Render:**

1. New > Web Service → connect repo, Runtime **PHP**, Build Command:
   ```bash
   composer install --no-dev && npm install && npm run build && php artisan migrate --force
   ```
2. Start Command: `php artisan serve --host=0.0.0.0 --port=$PORT`
3. Tambah **MySQL** (Render MySQL atau PlanetScale/neon) → salin `DB_*` ke Environment.
4. Set `APP_URL` ke URL Render, `APP_DEBUG=false`.

> Catatan: di lingkungan serverless/managed, set `SESSION_DRIVER=cookie` atau `cache` jika tabel sessions bermasalah, dan jalankan `php artisan storage:link` bila memakai upload file.

## Troubleshooting MySQL

| Gejala | Penyebab & Solusi |
|--------|-------------------|
| `SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost'` | Password salah atau user dibuat untuk host berbeda. Cek `DB_USERNAME`/`DB_PASSWORD` di `.env`, lalu `php artisan config:clear`. Di MySQL 8 buat user: `CREATE USER 'portfolio'@'localhost' IDENTIFIED BY 'secret'; GRANT ALL ON portfolio_db.* TO 'portfolio'@'localhost';` |
| `SQLSTATE[HY000] [1049] Unknown database 'portfolio_db'` | Database belum dibuat. Jalankan: `CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;` |
| `Connection refused` di port 3306 | MySQL belum jalan / listen berbeda. `sudo systemctl status mysql`, cek port di `my.cnf` (`port=`) dan samakan dengan `DB_PORT`. |
| `General error: 1366 Incorrect integer value ... for column 'level'` | Kiriman form tidak numeric. Field `level` divalidasi `integer` — pastikan nilai 0–100 atau kosong. |
| `No application encryption key has been specified` | `.env` belum punya `APP_KEY`. Jalankan `php artisan key:generate`. |
| Perubahan `.env` tidak terbaca | `php artisan config:clear` (atau `config:cache` ulang di production). |
| `The table 'migrations' doesn't exist` / migrasi dobel | `php artisan migrate:fresh --seed` (hapus semua data!) atau `php artisan migrate:rollback` lalu `migrate`. |
| Kedip tema terang saat buka halaman (dark mode) | Pastikan inline script di `<head>` `layouts/app.blade.php` tidak dihapus — script itu menerapkan class `dark` sebelum paint. |
| Aset 404 di production | Jalankan `npm run build` lalu pastikan folder `public/build` ikut ter-deploy; `php artisan view:clear`. |

## License

MIT — silakan dipakai dan dimodifikasi untuk portofolio Anda sendiri.
# MyRortoolio
