<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/courses",
     *     summary="取得課程列表並附帶講師資訊 (僅取2筆)",
     *     @OA\Response(
     *         response=200,
     *         description="成功取得課程資料",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Course"))
     *     )
     * )
     */
    public function index()
    {
        $courses = Course::with('teacher')->take(2)->get();
        return response()->json($courses);
    }

    /**
     * @OA\Post(
     *     path="/courses",
     *     summary="新增課程",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CourseInput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="成功建立課程",
     *         @OA\JsonContent(ref="#/components/schemas/Course")
     *     )
     * )
     */
    public function store(Request $request)
    {
        // 驗證使用者輸入資料，確保必填欄位正確填寫
        $validated = $request->validate([
            'name'        => 'required|string',
            'description' => 'nullable|string',
            'start_time'  => 'required|string|size:4',
            'end_time'    => 'required|string|size:4',
            'teacher_id'  => 'required|exists:teachers,id',
        ]);

        // 建立新的課程資料
        $course = Course::create($validated);
        return response()->json($course, 201);
    }

    /**
     * @OA\Put(
     *     path="/courses/{course}",
     *     summary="更新課程",
     *     @OA\Parameter(
     *         name="course",
     *         in="path",
     *         required=true,
     *         description="課程 ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CourseInput")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="成功更新課程",
     *         @OA\JsonContent(ref="#/components/schemas/Course")
     *     )
     * )
     */
    public function update(Request $request, Course $course)
    {
        // 驗證更新資料，設定局部更新規則
        $validated = $request->validate([
            'name'        => 'sometimes|required|string',
            'description' => 'sometimes|nullable|string',
            'start_time'  => 'sometimes|required|string|size:4',
            'end_time'    => 'sometimes|required|string|size:4',
            'teacher_id'  => 'sometimes|required|exists:teachers,id',
        ]);

        // 更新並儲存課程資料
        $course->update($validated);
        return response()->json($course);
    }

    /**
     * @OA\Delete(
     *     path="/courses/{course}",
     *     summary="刪除課程",
     *     @OA\Parameter(
     *         name="course",
     *         in="path",
     *         required=true,
     *         description="課程 ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="成功刪除課程",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Course deleted")
     *         )
     *     )
     * )
     */
    public function destroy(Course $course)
    {
        // 刪除指定課程資料
        $course->delete();
        return response()->json(['message' => 'Course deleted'], 200);
    }
}
