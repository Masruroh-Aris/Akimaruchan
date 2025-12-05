<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['course_id', 'date', 'type', 'topics', 'score'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
