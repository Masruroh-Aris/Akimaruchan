<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nim' => '2023150103',
            'name' => 'Masruroh',
            'semester' => 5,
            'academic_year' => '2025/2026',
        ]);
    }
}
