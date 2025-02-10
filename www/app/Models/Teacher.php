<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;
    // 可批次賦值欄位
    protected $fillable = ['name', 'email', 'password'];

    // 一個講師開設多門課程
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
