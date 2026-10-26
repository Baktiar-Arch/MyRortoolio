# Personal Portfolio — Static Site untuk Netlify

Versi static (tanpa database, tanpa server) dari website portofolio pribadi. Desain dan fitur disamakan dengan versi Laravel, tetapi dibangun dengan **HTML + Tailwind CSS + Alpine.js** sehingga bisa di-deploy langsung ke **Netlify** (gratis).

## Fitur

- Single page: Hero, About, Skills (per kategori), Projects (card), Contact
- Dark mode toggle (Alpine.js + `localStorage`, anti-FOUC)
- Smooth scroll + navbar fixed + mobile hamburger menu
- Animasi section saat muncul (Intersection Observer)
- **Netlify Forms** — form kontak tanpa backend, pesan masuk ke dashboard Netlify
- Submit AJAX (tanpa reload) dengan fallback POST biasa ke halaman sukses
- Build CSS minified (Tailwind CLI) + bundle JS (esbuild + Alpine)
- Security headers via `netlify.toml`

## Struktur

```
portfolio-netlify/
├── netlify.toml              # Config build + headers Netlify
├── package.json              # Script build (Tailwind CLI + esbuild)
├── tailwind.config.js
└── src/
    ├── index.html            # Halaman utama (satu file, semua section)
    ├── success.html          # Halaman ucapan terima kasih setelah submit
    ├── css/input.css         # Source CSS (Tailwind directives + .reveal)
    └── js/app.js             # Alpine components + Intersection Observer
```

Hasil build ada di `dist/` (di-publish ke Netlify).

## Jalankan Lokal

```bash
cd portfolio-netlify
npm install
npm run build        # hasil ke dist/
npx serve dist       # buka http://localhost:3000
```

Untuk pengembangan (watch CSS):

```bash
npm run dev          # build sekali lalu watch perubahan CSS
# di terminal lain: npx serve dist
```

> Catatan: Netlify Forms hanya aktif di domain Netlify. Saat testing lokal, submit form akan POST ke `/` (halaman utama) — itu normal.

## Deploy ke Netlify

### A. Drag & Drop (paling cepat)

1. `npm run build` di lokal
2. Buka <https://app.netlify.com/drop>
3. Seret folder `dist/` ke halaman tersebut
4. Selesai — Anda dapat URL seperti `https://nama-acak.netlify.app`

### B. Git (otomatis setiap push) — direkomendasikan

1. Push folder `portfolio-netlify` ke GitHub (bisa sebagai repo sendiri, atau folder dalam monorepo)
2. Di Netlify: **Add new site → Import an existing project** → pilih repo
3. Isi:
   - **Base directory**: `portfolio-netlify` (jika repo monorepo; kosongkan jika repo khusus)
   - Build command & publish folder sudah terbaca otomatis dari `netlify.toml`
4. **Deploy site**

Setiap `git push` ke branch utama akan otomatis build & deploy ulang.

### C. Netlify CLI

```bash
npm install -g netlify-cli
cd portfolio-netlify
npm run build
netlify deploy --prod --dir=dist
```

Login pertama kali akan membuka browser untuk otorisasi.

## Mengelola Form Kontak (Netlify Forms)

1. Setelah deploy pertama, buka **Netlify Dashboard → Site → Forms**
2. Form bernama `contact` akan muncul otomatis (terdeteksi dari atribut `data-netlify="true"`)
3. Pesan yang masuk terlihat di tab **Received**; bisa di-download CSV atau set notifikasi email (**Form settings → Notification**)

Batasan gratis: **100 submission/bulan**. Untuk lebih, upgrade paket Netlify atau ganti form ke layanan lain (Formspree, Web3Forms, dll).

## Cara Mengganti Data Pribadi

Semua konten ada di **`src/index.html`** (tidak ada database):

| Bagian | Lokasi di file |
|--------|----------------|
| Nama, role, tagline | Hero (`<section id="home">`) + `<title>` + meta description |
| Foto/Inisial & teks About | `<section id="about">` |
| Skills | `<section id="skills">` — edit/tambah `<span>` badge per kategori |
| Proyek | `<section id="projects">` — duplikat satu `<article>` lalu ganti isinya |
| Email & sosial media | Footer + `<section id="contact">` |
| Tema warna | Cari/ganti kelas `indigo-` di seluruh file (mis. `emerald-`, `violet-`) |

Setelah edit: `npm run build` lalu push (atau seret `dist/` lagi ke Netlify Drop).

## Troubleshooting

| Gejala | Solusi |
|--------|--------|
| Build gagal di Netlify: `npm ERR!` | Cek log build; pastikan `netlify.toml` terbaca (Base directory benar untuk monorepo) |
| Form tidak muncul di dashboard Forms | Atribut `data-netlify="true"`, `name="contact"`, dan hidden input `form-name` harus ada di HTML yang ter-deploy (file di `dist/`, bukan hanya `src/`) |
| Submit form lokal error | Wajar — Forms hanya bekerja di hosting Netlify. Deploy dulu untuk menguji |
| CSS tidak berubah setelah edit | Jalankan ulang `npm run build`; pastikan membuka `dist/` bukan `src/` |
| Font/gaya hilang saat offline | Font dimuat dari fonts.bunny.net (butuh internet) |
| Halaman gelap terang saat pertama buka | Jangan hapus inline `<script>` di `<head>` — script itu menerapkan class `dark` sebelum paint |

## Perbandingan dengan Versi Laravel

| | Versi Laravel (folder induk) | Versi Netlify (folder ini) |
|---|---|---|
| Hosting | Shared/VPS/Railway (butuh PHP + MySQL) | Netlify (static, gratis) |
| Data proyek/skill | Database MySQL + admin panel | Edit langsung di `src/index.html` |
| Form kontak | Tersimpan di tabel `contact_messages` | Netlify Forms (dashboard Netlify) |
| Autentikasi | Laravel Breeze | Tidak ada (tidak perlu) |

Pilih versi Netlify jika ingin hosting gratis tanpa maintenance server; pilih versi Laravel jika butuh admin panel & database.

## License

MIT
