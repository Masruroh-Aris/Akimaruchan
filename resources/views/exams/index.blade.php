@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Exam Schedule</h1>
        <a href="{{ route('exams.create') }}" class="btn btn-primary">+ Schedule Exam</a>
    </div>

    <div class="card" style="padding: 0; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #F9FAFB; text-align: left;">
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Date</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Course</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Type</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Topics</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Score</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $exam)
                <tr style="border-bottom: 1px solid #F0F3F8;">
                    <td style="padding: 1rem;">
                        <div style="font-weight: 600;">{{ \Carbon\Carbon::parse($exam->date)->format('d M Y') }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ \Carbon\Carbon::parse($exam->date)->format('H:i') }}</div>
                    </td>
                    <td style="padding: 1rem; font-weight: 500;">{{ $exam->course->name }}</td>
                    <td style="padding: 1rem;">
                        <span class="badge" style="background: #E5F7FF; color: #0095FF;">{{ $exam->type }}</span>
                    </td>
                    <td style="padding: 1rem; color: var(--text-muted); max-width: 200px;">{{ $exam->topics ?? '-' }}</td>
                    <td style="padding: 1rem;">
                        @if($exam->score)
                            <span style="font-weight: 700; color: var(--primary);">{{ $exam->score }}</span>
                        @else
                            <span style="color: var(--text-muted);">-</span>
                        @endif
                    </td>
                    <td style="padding: 1rem;">
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('exams.edit', $exam->id) }}" class="btn" style="padding: 0.4rem 0.8rem; background: #DBEAFE; color: #2563EB; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" onsubmit="return confirm('Delete this exam?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="padding: 0.4rem 0.8rem; background: #FFE2E5; color: #F95959; font-size: 0.8rem;">Del</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
