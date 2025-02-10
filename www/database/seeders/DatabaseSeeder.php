<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 生成 2 個假講師
        Teacher::factory(2)->create();

        // 生成 5 個假課程，每個課程會自動關聯一個講師
        Course::factory(5)->create();

        // 生成 10 個假學生
        Student::factory(10)->create();
    }
}
