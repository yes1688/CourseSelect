<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    // 可批次賦值欄位
    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'teacher_id'];

    // 課程屬於一個講師
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    // 課程有多個學生選課
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
}
