<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use App\Models\Project;
use App\Models\Exam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $tasks = Task::with('course')->orderBy('deadline', 'asc')->get();
        $projects = Project::all();
        $exams = Exam::with('course')->orderBy('date', 'asc')->get();
        

        $priorityTask = $tasks->where('status', '!=', 'Submitted')->first();

        return view('dashboard', compact('courses', 'tasks', 'projects', 'exams', 'priorityTask'));
    }
}
