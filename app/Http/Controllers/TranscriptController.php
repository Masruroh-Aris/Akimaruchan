<?php

namespace App\Http\Controllers;

use App\Models\Transcript;
use Illuminate\Http\Request;

class TranscriptController extends Controller
{

    public function index()
    {
        $transcripts = Transcript::all();

        $gradedTranscripts = $transcripts->whereNotNull('grade');
        
        $totalSKS = $gradedTranscripts->sum('sks');
        $totalQualityPoints = $gradedTranscripts->sum(function($transcript) {
            return $transcript->sks * $transcript->quality_points;
        });

        $ipk = $totalSKS > 0 ? $totalQualityPoints / $totalSKS : 0;

        $improvableCourses = $transcripts->filter(function($transcript) {
            return $transcript->quality_points < 4.00 && $transcript->grade !== null;
        });

        $sksToRetake = $improvableCourses->sum('sks');
        
        return view('transcripts.index', compact('transcripts', 'ipk', 'totalSKS', 'improvableCourses', 'sksToRetake'));
    }


    public function create()
    {
        return view('transcripts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'course_name' => 'required|string',
            'sks' => 'required|integer|min:1',
            'grade' => 'nullable|string|in:A,B,C,D,E',
        ]);

        $data = $request->all();

        // Auto-calculate grade_point if not provided
        if ($request->filled('grade') && !$request->filled('grade_point')) {
            $data['grade_point'] = match ($request->grade) {
                'A' => 4.00,
                'B' => 3.00,
                'C' => 2.00,
                'D' => 1.00,
                'E' => 0.00,
                default => 0.00,
            };
        }

        Transcript::create($data);

        return redirect()->route('transcripts.index')->with('success', 'Grade added successfully!');
    }


    public function show(Transcript $transcript)
    {
        return redirect()->route('transcripts.index');
    }


    public function edit(Transcript $transcript)
    {
        return view('transcripts.edit', compact('transcript'));
    }


    public function update(Request $request, Transcript $transcript)
    {
        $request->validate([
            'code' => 'required|string',
            'course_name' => 'required|string',
            'sks' => 'required|integer|min:1',
            'grade' => 'nullable|string|in:A,B,C,D,E',
        ]);

        $data = $request->all();

        // Auto-calculate grade_point if not provided
        if ($request->filled('grade') && !$request->filled('grade_point')) {
            $data['grade_point'] = match ($request->grade) {
                'A' => 4.00,
                'B' => 3.00,
                'C' => 2.00,
                'D' => 1.00,
                'E' => 0.00,
                default => 0.00,
            };
        }

        $transcript->update($data);

        return redirect()->route('transcripts.index')->with('success', 'Grade updated successfully!');
    }


    public function destroy(Transcript $transcript)
    {
        $transcript->delete();
        return redirect()->route('transcripts.index')->with('success', 'Grade deleted successfully!');
    }
}
