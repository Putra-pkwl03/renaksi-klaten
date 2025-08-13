
````markdown
# Renaksi Laravel App

Aplikasi manajemen **Laporan Renaksi** berbasis Laravel, dengan fitur autentikasi pengguna (register, login, logout) dan CRUD laporan.  
Database yang digunakan: **Renaksi-DB**

---

## Fitur
- **Autentikasi**
  - Registrasi akun baru
  - Login & Logout
- **Manajemen Laporan Renaksi**
  - Tambah laporan baru
  - Edit laporan
  - Hapus laporan
  - Tampilkan laporan berdasarkan kategori (A, B, C, D)
- Middleware **guest** dan **auth** untuk membatasi akses halaman
- Struktur view menggunakan layout `layouts-eg.horizontal`
- Service `LaporanRenaksiService` untuk pengolahan data per kategori

---

## Instalasi

1. **Clone repository**
   ```bash
   git clone git@gitlab.com:virgianf/renaksi-klaten.git
   cd renaksi-klaten
````

2. **Install dependencies**

   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Buat file environment**

   ```bash
   cp .env.example .env
   ```

   Ubah konfigurasi database di `.env`:

   ```env
   DB_DATABASE=Renaksi-DB
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate app key**

   ```bash
   php artisan key:generate
   ```

5. **Migrasi database**

   ```bash
   php artisan migrate
   ```

---

## Struktur Utama

* **Controllers**

  * `AuthController` → Autentikasi pengguna
  * `LaporanRenaksiController` → CRUD Laporan Renaksi
* **Models**

  * `User`
  * `LaporanRenaksi`
* **Routes**

  * `web.php` → Routing web dan middleware auth/guest
* **Services**

  * `LaporanRenaksiService` → Pengelompokan data berdasarkan kategori

---

## Database

Nama database: **Renaksi-DB**

Tabel utama:

* `users`
* `laporan_renaksis` (menyimpan data laporan)

---

