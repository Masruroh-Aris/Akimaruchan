@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Task Details</h1>
        <a href="{{ route('dashboard') }}" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
            <div>
                <span class="badge badge-{{ strtolower($task->priority) }}" style="margin-bottom: 0.5rem; display: inline-block;">{{ $task->priority }} Priority</span>
                <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">{{ $task->name }}</h2>
                <p style="color: var(--text-muted); font-size: 1.1rem;">{{ $task->course->name }}</p>
            </div>
            <span class="badge badge-{{ strtolower(str_replace(' ', '', $task->status)) == 'todo' ? 'todo' : (strtolower(str_replace(' ', '', $task->status)) == 'inprogress' ? 'progress' : 'submitted') }}" style="font-size: 1rem; padding: 0.5rem 1rem;">
                {{ $task->status }}
            </span>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; padding-top: 2rem; border-top: 1px solid #F0F3F8;">
            <div>
                <h4 style="color: var(--text-muted); margin-bottom: 0.5rem;">Deadline</h4>
                <p style="font-size: 1.1rem; font-weight: 500;">{{ \Carbon\Carbon::parse($task->deadline)->format('l, d F Y') }}</p>
                <p style="color: var(--text-muted);">{{ \Carbon\Carbon::parse($task->deadline)->format('H:i') }}</p>
            </div>
            <div>
                <h4 style="color: var(--text-muted); margin-bottom: 0.5rem;">Link</h4>
                @if($task->link)
                    <a href="{{ $task->link }}" target="_blank" style="color: var(--primary); text-decoration: none; font-weight: 500;">Open Resource ↗</a>
                @else
                    <p style="color: var(--text-muted);">No link provided</p>
                @endif
            </div>
        </div>

        <div style="display: flex; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid #F0F3F8;">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary" style="flex: 1; text-align: center;">Edit Task</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="width: 100%; background: #FFE2E5; color: #F95959;">Delete Task</button>
            </form>
        </div>
    </div>
</div>
@endsection
