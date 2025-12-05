@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Course</h1>
        <a href="{{ route('dashboard') }}" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Name</label>
                    <input type="text" name="name" value="{{ $course->name }}" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">SKS</label>
                    <input type="number" name="sks" value="{{ $course->sks }}" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Lecturer</label>
                    <input type="text" name="lecturer" value="{{ $course->lecturer }}" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Target Grade</label>
                    <input type="text" name="target_grade" value="{{ $course->target_grade }}" placeholder="A" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Progress (%)</label>
                <input type="range" name="progress" min="0" max="100" value="{{ $course->progress }}" oninput="this.nextElementSibling.value = this.value" style="width: 100%;">
                <output style="font-weight: bold; color: var(--primary);">{{ $course->progress }}</output>%
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Learning Contract</label>
                <textarea name="learning_contract" rows="3" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">{{ $course->learning_contract }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Achievements / Updates</label>
                <textarea name="achievements" rows="3" placeholder="What have you learned so far?" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">{{ $course->achievements }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Course</button>
        </form>
    </div>
</div>
@endsection
