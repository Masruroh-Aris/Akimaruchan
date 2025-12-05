<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $c1 = \App\Models\Course::create(['name' => 'Kecerdasan Buatan', 'lecturer' => 'Dr. AI', 'sks' => 3, 'progress' => 80]);
        $c2 = \App\Models\Course::create(['name' => 'Pemrograman Mobile', 'lecturer' => 'Pak Android', 'sks' => 3, 'progress' => 60]);
        $c3 = \App\Models\Course::create(['name' => 'Keamanan Jaringan', 'lecturer' => 'Bu Cyber', 'sks' => 2, 'progress' => 40]);

        \App\Models\Task::create([
            'name' => 'Membuat API Login',
            'course_id' => $c2->id,
            'deadline' => now()->addDays(2),
            'priority' => 'High',
            'status' => 'In Progress',
            'link' => '#'
        ]);

        \App\Models\Task::create([
            'name' => 'Laporan Algoritma A*',
            'course_id' => $c1->id,
            'deadline' => now()->addDays(5),
            'priority' => 'Medium',
            'status' => 'To Do',
            'link' => '#'
        ]);

        \App\Models\Project::create([
            'name' => 'Tugas Besar Web',
            'description' => 'E-commerce Laravel',
            'repo_link' => 'https://github.com/user/project'
        ]);

        \App\Models\Exam::create([
            'course_id' => $c3->id,
            'date' => now()->addWeeks(2),
            'type' => 'UTS'
        ]);
    }
}
