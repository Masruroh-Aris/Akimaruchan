# Akimaruchan
Akimaruchan: Sistem Manajemen Diri Berbasis Laravel 12. Solusi all-in-one untuk mahasiswa IT. Pantau IPK dengan akurasi tinggi, kelola jadwal ujian, dan lacak deadline tugas dalam satu dashboard yang responsif. Dilengkapi fitur Learning Contract, integrasi GitHub, dan antarmuka personal yang ramah. Teman digital terbaik untuk perjalanan akademikmu.

# Akimaruchan 🐱

**Sistem Manajemen Diri Mahasiswa & Asisten Akademik Cerdas**
*Built with Laravel 12*

![Project Status](https://img.shields.io/badge/Status-Completed-success)
![Framework](https://img.shields.io/badge/Laravel-12.x-red)
![License](https://img.shields.io/badge/License-MIT-blue)

## 📖 Tentang Akimaruchan

**Akimaruchan** bukan sekadar aplikasi *To-Do List* biasa. Ini adalah sistem manajemen diri yang dirancang khusus untuk mahasiswa Informatika, mengubah kekacauan jadwal kuliah menjadi alur kerja yang terstruktur dan berbasis data.

### 🐈 Filosofi & Inspirasi
Nama sistem ini diambil dari **Akimaru**, kucing kesayangan saya saat masa sekolah menengah. Filosofi ini menjadi nyawa dari pengembangan sistem:
* **Lincah:** Performa aplikasi yang cepat berbasis Laravel 12.
* **Responsif:** Antarmuka yang adaptif (sidebar "minggir" otomatis saat layar kecil/split-screen).
* **Setia:** Selalu ada 24/7 untuk mengingatkan deadline dan jadwal ujian.

---

## 🚀 Fitur Unggulan

### 1. 🔒 Keamanan & Personalisasi (Auth)
* **Restricted Login:** Akses eksklusif hanya untuk NIM **2023150103**.
* **Interactive Mascot:** Animasi kucing lucu pada halaman login yang bereaksi terhadap interaksi pengguna.
* **Dynamic Profile:** Avatar kustom (Hijab Style), sapaan personal ("Halo, Masruroh!"), dan edit data Semester/Tahun Ajaran langsung dari sidebar.

### 2. 🎓 Manajemen Akademik (Core)
* **Transkrip Nilai Presisi:**
    * Mencatat riwayat 39 mata kuliah.
    * **Kalkulator IPK Real-time:** Menghitung hingga 4 digit desimal (misal: 3.9305) dan mendukung nilai mutu spesifik (3.90, 3.60).
    * **Analisis "Path to 4.00":** Saran cerdas mata kuliah mana yang perlu diulang untuk mencapai IPK sempurna.
* **Course Management:** Kartu mata kuliah dengan *Progress Bar*, *Learning Contract*, dan *Target Grade*.
* **Exam Schedule:** Jadwal UTS/UAS terintegrasi dengan input nilai hasil ujian.

### 3. ⚡ Produktivitas & Dashboard
* **Priority Task Card:** Hero section otomatis menampilkan tugas dengan deadline terdekat.
* **Task Tracker:** Manajemen tugas dengan status warna (High/Medium/Low) dan status pengerjaan.
* **Quick Links:** Navigasi cepat ke **SIMA UNSIQ** dan **GitHub Dashboard**.

### 4. 📅 Manajemen Waktu (Right Sidebar)
* **Auto-Reminders:** Pengingat otomatis untuk H-7 Tugas dan H-30 Ujian.
* **Responsive Calendar:** Kalender interaktif dengan *today highlight*.
* **Collapsible UI:** Sidebar kanan dapat disembunyikan untuk mode fokus (*Distraction Free*).

---

## 🛠️ Teknologi yang Digunakan

* **Backend:** Laravel 12 (PHP)
* **Database:** MySQL
* **Frontend:** Blade Templates, CSS3 (Responsive Flexbox/Grid), JavaScript (Interactive DOM)
* **Tools:** Composer, Artisan

---

## 💻 Cara Instalasi (Installation Guide)

Karena repositori ini mungkin tidak menyertakan folder `vendor` (dan file `.env`), silakan ikuti langkah berikut untuk menjalankannya di komputer lokal Anda:

### Prasyarat
* PHP >= 8.2
* Composer
* MySQL / MariaDB

### Langkah-langkah

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/username-anda/akimaruchan.git](https://github.com/username-anda/akimaruchan.git)
    cd akimaruchan
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Konfigurasi Environment**
    * Duplikat file `.env.example` menjadi `.env`.
    * Buka file `.env` dan atur koneksi database Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=akimaruchan_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Key**
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database & Seeding (PENTING)**
    Langkah ini akan membuat tabel dan mengisi data dummy (Transkrip, Akun Login, Tugas).
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Buka browser dan akses: `http://localhost:8000`

---

## 🔑 Akun Demo

Untuk masuk ke dalam sistem, gunakan kredensial berikut (Sesuai Seeder):

* **NIM:** `2023150103`
* **Password:** (Default password dari seeder/auth logic Anda, misal `password` atau kosong jika bypass logic)

---
