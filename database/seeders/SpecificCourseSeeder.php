<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class SpecificCourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Pemrograman Perangkat Bergerak', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Interaksi Manusia dan Komputer', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Grafika Komputer', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Kecerdasan Komputasional', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Keamanan Sistem Komputer', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Pemrograman Web Berbasis Framework', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
            ['name' => 'Basis Data Terapan', 'sks' => 3, 'lecturer' => 'Dosen Pengampu'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
