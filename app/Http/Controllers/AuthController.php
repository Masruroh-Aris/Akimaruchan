<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Student;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
        ]);

        $student = Student::where('nim', $request->nim)->first();

        if ($student) {
            Session::put('is_logged_in', true);
            Session::put('user_name', $student->name);
            Session::put('student_id', $student->id);
            
            return redirect()->route('dashboard')->with('success', 'Halo ' . $student->name . '! Selamat datang kembali! ✨');
        }

        return back()->with('error', 'NIM tidak dikenali. Coba lagi ya!');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
