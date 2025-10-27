### DOKUMENTASI WEBSITE SERTIFIKASI JUNIOR WEB PROGRAMMER

## Tujuan

Dokumen ini akan menjelaskan cara menjalankan website di komputer lokal menggunakan XAMPP

## Teknologi yang digunakan

- PHP
- XAMPP (MySQL & Apache)
- Browser (Chrome, Edge, Brave, Opera, etc)
- Code Editor

## Setup Database

1. Buka phpMyAdmin
2. Buat database baru (nama bebas)
3. Impor file SQL yang ada di repository
4. Ubah konfigurasi `includes/db.php`:

```
$define("DB_NAME", "[ISI SESUAI NAMA DATABASE]")
```

## Cara Menjalankan Website

1. Pindahkan folder utama project ke `../XAMPP/htdocs`
2. Jalankan XAMPP (MySQL dan Apache)
3. Akses website melalui browser dengan alamat https://localhost/nama-project
