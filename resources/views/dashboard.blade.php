@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="card" style="background: var(--primary); color: white; margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between; padding: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Halo, {{ session('user_name', 'Masruroh') }}! 👋</h1>
            <p style="opacity: 0.9; margin-bottom: 1.5rem;">You have {{ $tasks->where('status', '!=', 'Submitted')->count() }} pending tasks. Keep up the good work!</p>
            
            @if($priorityTask)
            <div style="background: rgba(255,255,255,0.2); padding: 1rem; border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                    <span style="background: #FF754C; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; font-weight: bold;">PRIORITY TASK</span>
                    <span style="font-size: 0.8rem;">Deadline: {{ \Carbon\Carbon::parse($priorityTask->deadline)->diffForHumans() }}</span>
                </div>
                <h3 style="margin: 0;">{{ $priorityTask->name }}</h3>
                <p style="font-size: 0.9rem; margin-top: 0.2rem;">{{ $priorityTask->course->name }}</p>
            </div>
            @else
            <div style="background: rgba(255,255,255,0.2); padding: 1rem; border-radius: 12px;">
                <h3>No urgent tasks! 🎉</h3>
                <p>Time to learn something new?</p>
            </div>
            @endif
        </div>
        <div style="font-size: 8rem; opacity: 0.8;">
            💻
        </div>
    </div>

    <!-- Courses Section -->
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <h2 style="margin: 0;">Mata Kuliah Semester Ini</h2>
        <a href="{{ route('courses.create') }}" class="btn" style="background: white; color: var(--primary); border: 1px solid var(--primary); font-size: 0.9rem;">+ Add Course</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        @foreach($courses as $course)
        <a href="{{ route('courses.show', $course->id) }}" style="text-decoration: none; color: inherit;">
            <div class="card" style="transition: transform 0.2s; cursor: pointer;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <div style="width: 50px; height: 50px; background: {{ ['#ECEBFF', '#E5F7FF', '#FFF4DE'][rand(0,2)] }}; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        📚
                    </div>
                    <span class="badge" style="background: #F0F3F8; color: var(--text-muted);">{{ $course->sks }} SKS</span>
                </div>
                <h3 style="font-size: 1.1rem; margin-bottom: 0.2rem;">{{ $course->name }}</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1rem;">{{ $course->lecturer }}</p>
                
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.8rem;">
                    <span>Progress</span>
                    <span>{{ $course->progress }}%</span>
                </div>
                <div style="width: 100%; height: 6px; background: #F0F3F8; border-radius: 3px; overflow: hidden;">
                    <div style="width: {{ $course->progress }}%; height: 100%; background: var(--primary); border-radius: 3px;"></div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Tasks Table Section -->
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <h2 style="margin: 0;">Tasks List</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="font-size: 0.9rem;">+ Add New Task</a>
    </div>
    
    <div class="card" style="padding: 0; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #F9FAFB; text-align: left;">
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Task Name</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Subject</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Deadline</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Priority</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Status</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr style="border-bottom: 1px solid #F0F3F8;">
                    <td style="padding: 1rem; font-weight: 500;">{{ $task->name }}</td>
                    <td style="padding: 1rem; color: var(--text-muted);">{{ $task->course->name }}</td>
                    <td style="padding: 1rem; color: var(--text-muted);">{{ \Carbon\Carbon::parse($task->deadline)->format('d M, H:i') }}</td>
                    <td style="padding: 1rem;">
                        <span class="badge badge-{{ strtolower($task->priority) }}">{{ $task->priority }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        <span class="badge badge-{{ strtolower(str_replace(' ', '', $task->status)) == 'todo' ? 'todo' : (strtolower(str_replace(' ', '', $task->status)) == 'inprogress' ? 'progress' : 'submitted') }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td style="padding: 1rem;">
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn" style="padding: 0.4rem 0.8rem; background: #F0F3F8; color: var(--text); font-size: 0.8rem;">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn" style="padding: 0.4rem 0.8rem; background: #DBEAFE; color: #2563EB; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?');" style="display: inline;">
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
@endsection
