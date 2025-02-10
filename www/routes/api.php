<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;

// 課程列表查詢 API：取得課程資料，附帶講師資訊 (僅取2筆)
Route::get('courses', [CourseController::class, 'index']);
// 新增課程 API：透過 POST 新增課程資料
Route::post('courses', [CourseController::class, 'store']);
// 更新課程 API：透過 PUT 更新指定課程資料
Route::put('courses/{course}', [CourseController::class, 'update']);
// 刪除課程 API：刪除指定課程
Route::delete('courses/{course}', [CourseController::class, 'destroy']);

// 講師列表查詢 API：取得講師基本資訊 (僅取2筆)
Route::get('teachers', [TeacherController::class, 'index']);
// 新增講師 API：建立新的講師資料
Route::post('teachers', [TeacherController::class, 'store']);
// 查詢指定講師所開課程 API：僅取2筆課程資料
Route::get('teachers/{teacher}/courses', [TeacherController::class, 'courses']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
