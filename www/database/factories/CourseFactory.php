<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        $this->faker->locale = 'zh_TW'; // 設定 Faker 使用中文語系

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_time' => $this->faker->time('Hi'),
            'end_time' => $this->faker->time('Hi'),
            'teacher_id' => $this->faker->boolean ? Teacher::factory() : Teacher::inRandomOrder()->first()->id, // 50% 機率新增講師，50% 機率從現有講師中選擇
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
