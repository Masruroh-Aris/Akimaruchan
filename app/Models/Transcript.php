<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    protected $fillable = ['code', 'course_name', 'sks', 'grade', 'grade_point'];

    public function getQualityPointsAttribute()
    {
        if ($this->grade_point !== null) {
            return $this->grade_point;
        }

        return match ($this->grade) {
            'A' => 4.00,
            'B' => 3.00,
            'C' => 2.00,
            'D' => 1.00,
            'E' => 0.00,
            default => 0.00,
        };
    }
}
