@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Exam</h1>
        <a href="{{ route('exams.index') }}" class="btn" style="background: #E2E8F0; color: var(--text);">Back to List</a>
    </div>

    <div class="card">
        <form action="{{ route('exams.update', $exam->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course</label>
                <select name="course_id" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $exam->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Date & Time</label>
                    <input type="datetime-local" name="date" value="{{ \Carbon\Carbon::parse($exam->date)->format('Y-m-d\TH:i') }}" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Type</label>
                    <select name="type" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <option value="UTS" {{ $exam->type == 'UTS' ? 'selected' : '' }}>UTS (Midterm)</option>
                        <option value="UAS" {{ $exam->type == 'UAS' ? 'selected' : '' }}>UAS (Final)</option>
                        <option value="Quiz" {{ $exam->type == 'Quiz' ? 'selected' : '' }}>Quiz</option>
                        <option value="Presentation" {{ $exam->type == 'Presentation' ? 'selected' : '' }}>Presentation</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Topics / Materials</label>
                <textarea name="topics" rows="4" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">{{ $exam->topics }}</textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Score / Result</label>
                <input type="text" name="score" value="{{ $exam->score }}" placeholder="e.g. 85 or A" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Exam</button>
        </form>
    </div>
</div>
@endsection
