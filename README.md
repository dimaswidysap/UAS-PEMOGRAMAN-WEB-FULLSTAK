# Sistem Booking Ruangan

Aplikasi berbasis web untuk manajemen dan pemesanan (booking) ruangan, dilengkapi dengan panel admin untuk mengelola data ruangan, kategori, fasilitas, pengguna, serta persetujuan booking.

## 🚀 Fitur

### Admin

- CRUD Ruangan
- CRUD Kategori Ruangan
- CRUD Fasilitas Ruangan
- CRUD User
- Menerima / mengelola bookingan yang masuk dari user

### User

- Booking ruangan
- Melihat status bookingan

## 🛠️ Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP, JavaScript
- **Framework:** Laravel
- **Styling:** Vanilla CSS (tanpa framework CSS seperti Bootstrap/Tailwind)
- **Arsitektur:** Tidak menggunakan API (semua proses dilakukan secara server-side melalui controller Laravel)

## 📦 Instalasi

1. Clone repository ini

    ```bash
    git clone <url-repository-anda>
    cd <nama-folder-project>
    ```

2. Install dependencies PHP

    ```bash
    composer install
    ```

3. Salin file environment dan sesuaikan konfigurasi database

    ```bash
    cp .env.example .env
    ```

4. Generate application key

    ```bash
    php artisan key:generate
    ```

5. Jalankan migrasi database

    ```bash
    php artisan migrate
    ```

6. (Opsional) Jalankan seeder jika tersedia

    ```bash
    php artisan db:seed
    ```

7. Jalankan server lokal

    ```bash
    php artisan serve
    ```

8. Buka aplikasi melalui browser di `http://localhost:8000`

## 👤 Role Pengguna

| Role  | Hak Akses                                                           |
| ----- | ------------------------------------------------------------------- |
| Admin | Mengelola ruangan, kategori, fasilitas, user, dan memproses booking |
| User  | Melakukan booking ruangan dan melihat status booking miliknya       |

## ✅ Kelebihan

- Belum ada kelebihan khusus yang dapat disebutkan saat ini 😅

## ⚠️ Kekurangan

- Belum ada fitur pembayaran
- Belum ada detail jam yang sudah terpakai dalam sehari untuk booking ruangan (belum ada validasi bentrok jam booking)

## 📌 Rencana Pengembangan (To-Do)

- [ ] Menambahkan fitur pembayaran
- [ ] Menambahkan validasi jam booking agar tidak bentrok
- [ ] Penambahan fitur lain sesuai kebutuhan

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran/tugas dan bebas digunakan sesuai kebutuhan.
