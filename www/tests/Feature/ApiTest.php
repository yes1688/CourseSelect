<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Teacher;
use App\Models\Course;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\DatabaseSeeder']); // 執行 DatabaseSeeder
    }

    /**
     * Test Case 1: 課程列表 API 測試
     * 目的：驗證 GET /courses API 正確回傳最多 2 筆資料且附帶講師基本資訊。
     */
    public function testCourseListApi()
    {
        // 建立測試資料：2 位講師及多筆課程資料
        $teacher1 = Teacher::factory()->create();
        $teacher2 = Teacher::factory()->create();
        Course::factory()->create(['teacher_id' => $teacher1->id, 'name' => 'Course 1']);
        Course::factory()->create(['teacher_id' => $teacher2->id, 'name' => 'Course 2']);
        Course::factory()->create(['teacher_id' => $teacher1->id, 'name' => 'Course 3']); // 多餘資料

        $response = $this->getJson('/api/courses');
        $response->assertStatus(200);
        $data = $response->json();
        $this->assertLessThanOrEqual(2, count($data)); // 確保資料筆數不超過 2

        foreach ($data as $course) {
            $this->assertArrayHasKey('teacher', $course);
            $this->assertArrayHasKey('id', $course['teacher']);
            $this->assertArrayHasKey('name', $course['teacher']);
            $this->assertArrayHasKey('email', $course['teacher']);
        }
    }

    /**
     * Test Case 2: 新增講師 API 測試
     * 目的：確認 POST /teachers 能成功建立講師，並回傳正確資料。
     */
    public function testCreateTeacher()
    {
        $payload = [
            'name'     => '陳老師',
            'email'    => 'chen@example.com',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/api/teachers', $payload);

        $response->assertStatus(201);
        $data = $response->json();

        $this->assertArrayHasKey('id', $data);
        $this->assertEquals($payload['name'], $data['name']);
        $this->assertEquals($payload['email'], $data['email']);

        $this->assertDatabaseHas('teachers', [
            'email' => 'chen@example.com',
        ]);
    }

    /**
     * Test Case 3: 刪除課程 API 測試
     * 目的：測試 DELETE /courses/{course} 成功刪除課程資料。
     */
    public function testDeleteCourse()
    {
        // 建立一位講師與一筆課程資料
        $teacher = Teacher::factory()->create();
        $course = Course::factory()->create(['teacher_id' => $teacher->id, 'name' => 'Course 1']);

        $response = $this->deleteJson("/api/courses/{$course->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Course deleted']);

        $this->assertDatabaseMissing('courses', [
            'id' => $course->id,
        ]);
    }
}
