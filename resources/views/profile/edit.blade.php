@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Profile</h1>
        <a href="{{ route('dashboard') }}" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 100px; height: 100px; background: #ddd; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                <img src="https://api.dicebear.com/9.x/avataaars/svg?seed={{ $student->name }}&top=hijab&hatColor=000000&backgroundColor=ffdfbf" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h2 style="margin-bottom: 0.5rem;">{{ $student->name }}</h2>
            <p style="color: var(--text-muted);">{{ $student->nim }}</p>
        </div>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Semester</label>
                <input type="number" name="semester" value="{{ $student->semester }}" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Academic Year</label>
                <input type="text" name="academic_year" value="{{ $student->academic_year }}" placeholder="e.g. 2025/2026" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Save Changes</button>
        </form>
    </div>
</div>
@endsection
