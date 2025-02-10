<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    // 可批次賦值欄位
    protected $fillable = ['name', 'email', 'password'];

    // 學生與課程之間的多對多關聯
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
