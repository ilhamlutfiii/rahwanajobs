# Rahwana Jobs

Rahwana Jobs adalah platform untuk mencari lowongan pekerjaan dan mengelola resume. Aplikasi ini dibangun menggunakan framework **Laravel** dan didesain agar mudah digunakan dan dikembangkan lebih lanjut.

## Fitur Utama
- Pencarian dan pengelolaan **lowongan kerja** (loker)
- Pengunggahan dan revisi **resume**
- Dashboard admin untuk mengelola pengguna, lowongan kerja, resume, dan statistik

## Persyaratan Sistem
Sebelum melakukan instalasi, pastikan sistem Anda memenuhi persyaratan berikut:
- PHP versi 8.0 atau lebih baru
- Composer
- MySQL
- Web server (Apache/Nginx)

## Instalasi

Berikut langkah-langkah untuk menginstal aplikasi Rahwana Jobs:

### 1. Clone Repository
Clone repository ke local machine Anda:
```bash
git clone https://github.com/ilhamlutfiii/rahwanajobs.git
cd rahwana-jobs
```
### 2. Install Dependencies
```bash
composer install
npm install
```
### 3. Buat File .env
```bash
cp .env.example .env
```
### Kemudian, buka file .env dan sesuaikan konfigurasi berikut:
- Database settings:
  ```env
  DB_DATABASE=rahwana
  DB_USERNAME=root
  DB_PASSWORD=
  ```
### 4. Import Database
File rahwana.sql berada di folder database, lalu import ke MySQL
### Symlink
```bash
php artisan storage:link
```
### 5. Generate Application Key
```bash
php artisan key:generate
```
### 6. Compiling Asset
```bash
npm run dev
```
### 7. Jalankan Server
```bash
php artisan serve
```
### 8. Login 
```bash
http://localhost:8000/
```
- Login Admin
    * Email     : admin@gmail.com
    * Password  : admin123
- Login User
    * Email     : user@gmail.com
    * Password  : users123

### Kontribusi
Silakan fork repository ini, buat branch baru, dan kirimkan pull request. Lebih senang lagi kalau klik tanda Star juga.
