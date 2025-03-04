# README: Website Laravel dengan Tailwind CSS & Alpine.js

## 📌 Pendahuluan
Repositori ini berisi source code website yang dibangun menggunakan Laravel sebagai backend serta Tailwind CSS dan Alpine.js untuk tampilan frontend.

## 🛠 Persyaratan
Sebelum menjalankan proyek ini, pastikan Anda telah menginstal perangkat lunak berikut:
- PHP ^8.0
- Composer
- Node.js & NPM
- Laravel ^10
- MySQL / PostgreSQL / SQLite (sesuai konfigurasi database Anda)

## 🚀 Instalasi
Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di mesin lokal Anda:

### 1️ Clone Repository
```bash
git clone https://github.com/username/repo-laravel-tailwind.git
cd repo-laravel-tailwind
```

### 2️ Instal Dependensi Laravel
```bash
composer install
```

### 3 Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database seperti berikut:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_omni_panel
DB_USERNAME=root
DB_PASSWORD=
```

Setelah itu, jalankan migrasi:
```bash
php artisan migrate --seed
```

### 4 Instal Dependensi Frontend
```bash
npm install
```

### 5 Compile Assets
```bash
npm run dev # Untuk mode pengembangan
```

### 6 Jalankan Server Laravel
```bash
php artisan serve
```
Akses aplikasi di `http://127.0.0.1:8000`


## 📌 Penggunaan Alpine.js
Alpine.js telah dikonfigurasi di proyek ini. Contoh penggunaan dalam Blade:
```html
<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <div x-show="open">Menu Dropdown</div>
</div>
```
