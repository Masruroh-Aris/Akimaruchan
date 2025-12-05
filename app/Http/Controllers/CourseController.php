<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        return redirect()->route('dashboard');
    }


    public function create()
    {
        return view('courses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'target_grade' => 'nullable|string|max:2',
            'learning_contract' => 'nullable|string',
        ]);

        Course::create([
            'name' => $request->name,
            'lecturer' => $request->lecturer,
            'sks' => $request->sks,
            'progress' => 0,
            'target_grade' => $request->target_grade,
            'learning_contract' => $request->learning_contract,
        ]);

        return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    }


    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }


    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'progress' => 'required|integer|min:0|max:100',
            'target_grade' => 'nullable|string|max:2',
            'learning_contract' => 'nullable|string',
            'achievements' => 'nullable|string',
        ]);

        $course->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Course updated successfully!');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('dashboard')->with('success', 'Course deleted successfully!');
    }
}
