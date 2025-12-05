<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'course_id', 'deadline', 'priority', 'status', 'link'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
