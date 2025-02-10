<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="Course Select API Documentation",
 *   description="API 文件說明 - Course Select 系統"
 * )
 *
 * @OA\Schema(
 *   schema="Teacher",
 *   type="object",
 *   description="講師資料結構",
 *   @OA\Property(property="id", type="integer", description="講師 ID"),
 *   @OA\Property(property="name", type="string", description="講師姓名"),
 *   @OA\Property(property="email", type="string", format="email", description="講師 Email")
 * )
 *
 * @OA\Schema(
 *   schema="TeacherWithCourses",
 *   type="object",
 *   description="包含課程資訊的講師資料結構",
 *   allOf={
 *     @OA\Schema(ref="#/components/schemas/Teacher"),
 *     @OA\Schema(
 *       @OA\Property(
 *         property="courses",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Course"),
 *         description="講師開設的課程"
 *       )
 *     )
 *   }
 * )
 *
 * @OA\Schema(
 *   schema="Course",
 *   type="object",
 *   description="課程資料結構",
 *   @OA\Property(property="id", type="integer", description="課程 ID"),
 *   @OA\Property(property="name", type="string", description="課程名稱"),
 *   @OA\Property(property="description", type="string", nullable=true, description="課程簡介"),
 *   @OA\Property(property="start_time", type="string", description="上課時間 (hhmm)"),
 *   @OA\Property(property="end_time", type="string", description="下課時間 (hhmm)"),
 *   @OA\Property(property="teacher_id", type="integer", description="講師 ID"),
 *   @OA\Property(property="teacher", ref="#/components/schemas/Teacher")
 * )
 *
 * @OA\Schema(
 *   schema="CourseInput",
 *   type="object",
 *   required={"name", "start_time", "end_time", "teacher_id"},
 *   description="新增/更新課程用的資料結構",
 *   @OA\Property(property="name", type="string", description="課程名稱"),
 *   @OA\Property(property="description", type="string", nullable=true, description="課程簡介"),
 *   @OA\Property(property="start_time", type="string", description="上課時間 (hhmm)"),
 *   @OA\Property(property="end_time", type="string", description="下課時間 (hhmm)"),
 *   @OA\Property(property="teacher_id", type="integer", description="講師 ID")
 * )
 *
 * @OA\Schema(
 *   schema="TeacherInput",
 *   type="object",
 *   required={"name", "email", "password"},
 *   description="新增講師用的資料結構",
 *   @OA\Property(property="name", type="string", description="講師姓名"),
 *   @OA\Property(property="email", type="string", format="email", description="講師 Email"),
 *   @OA\Property(property="password", type="string", format="password", description="登入密碼")
 * )
 */
class SwaggerDoc {}
