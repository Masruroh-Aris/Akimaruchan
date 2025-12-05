<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        $exams = Exam::with('course')->orderBy('date', 'asc')->get();
        return view('exams.index', compact('exams'));
    }


    public function create()
    {
        $courses = Course::all();
        return view('exams.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date' => 'required|date',
            'type' => 'required|string',
            'topics' => 'nullable|string',
        ]);

        Exam::create($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam scheduled successfully!');
    }


    public function show(Exam $exam)
    {

        return redirect()->route('exams.index');
    }


    public function edit(Exam $exam)
    {
        $courses = Course::all();
        return view('exams.edit', compact('exam', 'courses'));
    }


    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date' => 'required|date',
            'type' => 'required|string',
            'topics' => 'nullable|string',
            'score' => 'nullable|string',
        ]);

        $exam->update($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully!');
    }


    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully!');
    }
}
