<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ProfileController extends Controller
{
    public function edit()
    {
        $student = Student::find(session('student_id'));
        if (!$student) {
            return redirect()->route('login');
        }
        return view('profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer|min:1',
            'academic_year' => 'required|string',
        ]);

        $student = Student::find(session('student_id'));
        $student->update([
            'semester' => $request->semester,
            'academic_year' => $request->academic_year,
        ]);

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
