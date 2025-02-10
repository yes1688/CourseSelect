<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * @OA\Get(
     *     path="/teachers",
     *     summary="取得講師列表 (僅取2筆)",
     *     @OA\Response(
     *         response=200,
     *         description="成功取得講師資料",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Teacher"))
     *     )
     * )
     */
    public function index()
    {
        // 從資料庫中取出 2 筆講師資料
        $teachers = Teacher::limit(2)->get();
        return response()->json($teachers);
    }

    /**
     * @OA\Post(
     *     path="/teachers",
     *     summary="新增講師",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TeacherInput")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="成功建立講師",
     *         @OA\JsonContent(ref="#/components/schemas/Teacher")
     *     )
     * )
     */
    public function store(Request $request)
    {
        // 更新驗證規則
        $validated = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:6',
        ]);

        // 建立新的講師資料
        $teacher = Teacher::create($validated);
        return response()->json($teacher, 201);
    }

    /**
     * @OA\Get(
     *     path="/teachers/{teacher}/courses",
     *     summary="取得指定講師所開課程列表 (僅取2筆)",
     *     @OA\Parameter(
     *         name="teacher",
     *         in="path",
     *         required=true,
     *         description="講師 ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="成功取得課程列表",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Course"))
     *     )
     * )
     */
    public function courses(Teacher $teacher)
    {
        // 透過講師關聯關係取得最多2筆所開課程資料
        $courses = $teacher->courses()->limit(2)->get();
        return response()->json($courses);
    }
}
