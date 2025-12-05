@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Grade</h1>
        <a href="{{ route('transcripts.index') }}" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Transcript</a>
    </div>

    <div class="card">
        <form action="{{ route('transcripts.update', $transcript->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Code</label>
                    <input type="text" name="code" value="{{ $transcript->code }}" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Name</label>
                    <input type="text" name="course_name" value="{{ $transcript->course_name }}" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">SKS</label>
                    <input type="number" name="sks" value="{{ $transcript->sks }}" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Grade</label>
                    <select name="grade" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <option value="" {{ $transcript->grade == null ? 'selected' : '' }}>- Select Grade -</option>
                        <option value="A" {{ $transcript->grade == 'A' ? 'selected' : '' }}>A (4.00)</option>
                        <option value="B" {{ $transcript->grade == 'B' ? 'selected' : '' }}>B (3.00)</option>
                        <option value="C" {{ $transcript->grade == 'C' ? 'selected' : '' }}>C (2.00)</option>
                        <option value="D" {{ $transcript->grade == 'D' ? 'selected' : '' }}>D (1.00)</option>
                        <option value="E" {{ $transcript->grade == 'E' ? 'selected' : '' }}>E (0.00)</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Grade</button>
        </form>
    </div>
</div>

<script>
    document.querySelector('select[name="grade"]').addEventListener('change', function() {
        const grade = this.value;
        const pointInput = document.querySelector('input[name="grade_point"]');
        
        // Only update if point input is empty or has a standard value
        let point = '';
        switch(grade) {
            case 'A': point = '4.00'; break;
            case 'B': point = '3.00'; break;
            case 'C': point = '2.00'; break;
            case 'D': point = '1.00'; break;
            case 'E': point = '0.00'; break;
        }
        
        if (point) {
            pointInput.value = point;
        }
    });
</script>
@endsection
