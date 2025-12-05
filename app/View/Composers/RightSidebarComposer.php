<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Exam;
use App\Models\Task;
use Carbon\Carbon;

class RightSidebarComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Fetch upcoming exams (next 30 days)
        $upcomingExams = Exam::with('course')
            ->where('date', '>=', Carbon::now())
            ->where('date', '<=', Carbon::now()->addDays(30))
            ->orderBy('date', 'asc')
            ->take(3)
            ->get();

        // Fetch high priority tasks or approaching deadlines (next 7 days)
        $upcomingTasks = Task::with('course')
            ->where('status', '!=', 'Submitted')
            ->where(function($query) {
                $query->where('priority', 'High')
                      ->orWhere('deadline', '<=', Carbon::now()->addDays(7));
            })
            ->orderBy('deadline', 'asc')
            ->take(5)
            ->get();

        // Calendar Data
        $now = Carbon::now();
        $calendar = [
            'month' => $now->format('F Y'),
            'daysInMonth' => $now->daysInMonth,
            'startDayOfWeek' => $now->copy()->startOfMonth()->dayOfWeek, // 0 = Sunday
            'today' => $now->day,
        ];

        // Student Data
        $student = null;
        if (session()->has('student_id')) {
            $student = \App\Models\Student::find(session('student_id'));
        }

        $view->with('upcomingExams', $upcomingExams)
             ->with('upcomingTasks', $upcomingTasks)
             ->with('calendar', $calendar)
             ->with('student', $student);
    }
}
