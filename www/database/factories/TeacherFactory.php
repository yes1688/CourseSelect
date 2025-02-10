<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        $this->faker->locale = 'zh_TW'; // 設定 Faker 使用中文語系

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // 預設密碼
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
