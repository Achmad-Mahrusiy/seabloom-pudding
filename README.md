# Seabloom Pudding 🌊🍮

Website Seabloom Pudding adalah website promosi produk caramel pudding yang dibuat menggunakan bahan pangan lokal, yaitu ubi jalar ungu, ubi jalar kuning, dan bunga telang.

Website ini menggunakan konsep visual ocean-inspired dengan desain responsif untuk desktop, tablet, dan perangkat mobile.

## ✨ Fitur Website

- Landing page Seabloom Pudding.
- Katalog tiga varian produk.
- Informasi bahan lokal dan warna alami.
- Harga produk Rp7.000 per cup.
- Bundling dua varian bebas seharga Rp12.000.
- Tombol navigasi menuju katalog dan pemesanan.
- Layout responsif untuk desktop dan mobile.
- Bagian informasi pengambilan dan pengantaran.

## 🍮 Varian Produk

| Varian | Bahan | Harga |
|---|---|---:|
| Sunny Shore | Ubi jalar kuning | Rp7.000 |
| Twilight Sea | Ubi jalar ungu | Rp7.000 |
| Ocean Blue | Bunga telang | Rp7.000 |
| Bundling | Dua varian bebas | Rp12.000 |

## 🛠️ Teknologi

- PHP
- Laravel
- HTML
- CSS
- JavaScript

## 🚀 Menjalankan Project Secara Lokal

### 1. Clone repository

```bash
git clone https://github.com/Achmad-Mahrusiy/seabloom-pudding.git
```

### 2. Masuk ke folder project

```bash
cd seabloom-pudding
```

### 3. Install dependensi PHP

```bash
composer install
```

### 4. Siapkan file environment

```bash
copy .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Bersihkan cache konfigurasi

```bash
php artisan optimize:clear
```

### 7. Jalankan Laravel

```bash
php artisan serve
```

Buka website di:

http://127.0.0.1:8000

## 📁 Lokasi File Website

- `app/Http/Controllers/HomeController.php` — data dan logika halaman utama.
- `routes/web.php` — routing website.
- `resources/views/home.blade.php` — struktur halaman.
- `public/css/style.css` — tampilan dan desain responsif.
- `public/js/script.js` — interaksi menu navigasi.
- `public/images/` — logo dan foto produk.

## 📌 Catatan

- Pastikan foto produk tersedia di folder `public/images/`.
- Isi URL Google Form di konfigurasi controller sebelum menggunakan tombol pemesanan.
- Jangan mengunggah file `.env` atau kredensial pribadi ke repository publik.

---

Developed as a web project for Seabloom Pudding.
