<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {

        return redirect()->route('dashboard');
    }


    public function create()
    {
        $courses = Course::all();
        return view('tasks.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'deadline' => 'required|date',
            'priority' => 'required|in:High,Medium,Low',
            'link' => 'nullable|url'
        ]);

        Task::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'status' => 'To Do',
            'link' => $request->link
        ]);

        return redirect()->route('dashboard')->with('success', 'Task created successfully!');
    }


    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }


    public function edit(Task $task)
    {
        $courses = Course::all();
        return view('tasks.edit', compact('task', 'courses'));
    }


    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'deadline' => 'required|date',
            'priority' => 'required|in:High,Medium,Low',
            'status' => 'required|in:To Do,In Progress,Submitted',
            'link' => 'nullable|url'
        ]);

        $task->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Task deleted successfully!');
    }
}
