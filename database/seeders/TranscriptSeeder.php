<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transcript;
use Illuminate\Support\Facades\DB;

class TranscriptSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('transcripts')->truncate();

        $data = [
            ['code' => 'MBKU-07.03.003', 'course_name' => "Tajwid dan Tahsin Al-Qur'an", 'sks' => 2, 'grade' => 'B', 'grade_point' => 3.90],
            ['code' => 'MBKP-07.03.504', 'course_name' => 'Sistem Digital', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.006', 'course_name' => 'Aswaja An-Nahdliyah', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKN-07.03.001', 'course_name' => 'Agama', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.009', 'course_name' => 'Bahasa Inggris', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKN-07.03.002', 'course_name' => 'Pancasila', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.012', 'course_name' => 'Ilmu Komputasi', 'sks' => 2, 'grade' => 'B', 'grade_point' => 3.60],
            ['code' => 'MBKN-07.03.004', 'course_name' => 'Bahasa Indonesia', 'sks' => 2, 'grade' => 'B', 'grade_point' => 3.80],
            ['code' => 'MBKP-07.03.106', 'course_name' => 'Logika Informatika', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.503', 'course_name' => 'Sistem Operasi', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKN-07.03.003', 'course_name' => 'Kewarganegaraan', 'sks' => 2, 'grade' => 'B', 'grade_point' => 3.50],
            ['code' => 'MBKU-07.03.001', 'course_name' => "Tahfidzul Qur'an Dasar", 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.103', 'course_name' => 'Kalkulus', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.004', 'course_name' => "Ulumul Qur'an", 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.201', 'course_name' => 'Algoritma dan Dasar Pemrograman', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.005', 'course_name' => "Al-Qur'an dan Sains Modern", 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.502', 'course_name' => 'Arsitektur dan Organisasi Komputer', 'sks' => 3, 'grade' => 'B', 'grade_point' => 3.90],
            ['code' => 'MBKP-07.03.102', 'course_name' => 'Statistika dan Probabilitas', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.104', 'course_name' => 'Aljabar Linier', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.404', 'course_name' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'grade' => 'B', 'grade_point' => 3.80],
            ['code' => 'MBKP-07.03.401', 'course_name' => 'Basis Data', 'sks' => 3, 'grade' => 'B', 'grade_point' => 3.90],
            ['code' => 'MBKP-07.03.601', 'course_name' => 'Komunikasi Data dan Jaringan Komputer', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.202', 'course_name' => 'Algoritma dan Struktur Data', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKU-07.03.002', 'course_name' => "Tahfidzul Qur'an Ayat Profesi", 'sks' => 2, 'grade' => 'B', 'grade_point' => 3.80],
            ['code' => 'MBKU-07.03.007', 'course_name' => 'Studi Pesantren', 'sks' => 2, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.203', 'course_name' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.207', 'course_name' => 'Desain dan Analisis Algoritma', 'sks' => 3, 'grade' => 'B', 'grade_point' => 3.60],
            ['code' => 'MBKP-07.03.204', 'course_name' => 'Pemrograman Web', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.403', 'course_name' => 'Analisis dan Desain Berorientasi Objek', 'sks' => 3, 'grade' => 'B', 'grade_point' => 3.70],
            ['code' => 'MBKP-07.03.205', 'course_name' => 'Teori Bahasa dan Otomata', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.105', 'course_name' => 'Komputasi Numerik', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.301', 'course_name' => 'Kecerdasan Buatan', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.209', 'course_name' => 'Pemrograman Perangkat Bergerak', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
            ['code' => 'MBKP-07.03.405', 'course_name' => 'Interaksi Manusia dan Komputer', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
            ['code' => 'MBKP-07.03.701', 'course_name' => 'Grafika Komputer', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
            ['code' => 'MBKP-07.03.302', 'course_name' => 'Kecerdasan Komputasional', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
            ['code' => 'MBKP-07.03.602', 'course_name' => 'Keamanan Sistem Komputer', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
            ['code' => 'MBKP-07.03.208', 'course_name' => 'Pemrograman Web Berbasis Framework', 'sks' => 3, 'grade' => 'A', 'grade_point' => 4.00],
            ['code' => 'MBKP-07.03.402', 'course_name' => 'Basis Data Terapan', 'sks' => 3, 'grade' => null, 'grade_point' => 0.00],
        ];

        foreach ($data as $item) {
            Transcript::create($item);
        }
    }
}
