# Database Design

下列為選課系統對應的資料表設計：

## 1. teachers

| 欄位        | 型別      | 說明          |
|-------------|-----------|---------------|
| id          | int(10)   | PK，遞增流水號 |
| name        | varchar   | 講師姓名      |
| email       | varchar   | 講師 Email     |
| password    | varchar   | 登入密碼       |
| created_at  | timestamp | 建立時間       |
| updated_at  | timestamp | 更新時間       |

### 索引
- PRIMARY KEY (id)
- UNIQUE KEY (email)：避免重複註冊

## 2. students

| 欄位        | 型別      | 說明          |
|-------------|-----------|---------------|
| id          | int(10)   | PK，遞增流水號 |
| name        | varchar   | 學生姓名      |
| email       | varchar   | 學生 Email     |
| password    | varchar   | 登入密碼       |
| created_at  | timestamp | 建立時間       |
| updated_at  | timestamp | 更新時間       |

### 索引
- PRIMARY KEY (id)
- UNIQUE KEY (email)：避免重複註冊

## 3. courses

| 欄位        | 型別      | 說明                         |
|-------------|-----------|------------------------------|
| id          | int(10)   | PK，遞增流水號                |
| name        | varchar   | 課程名稱                      |
| description | text      | 課程簡介（可為 null）         |
| start_time  | char(4)   | 上課時間（hhmm 格式）         |
| end_time    | char(4)   | 下課時間（hhmm 格式）         |
| teacher_id  | int(10)   | 與 teachers 表的關聯外鍵       |
| created_at  | timestamp | 建立時間                      |
| updated_at  | timestamp | 更新時間                      |

### 索引
- PRIMARY KEY (id)
- FOREIGN KEY (teacher_id) REFERENCES teachers(id)

## 4. course_student

| 欄位         | 型別    | 說明                   |
|--------------|---------|------------------------|
| course_id    | int(10) | 與課程關聯的外鍵       |
| student_id   | int(10) | 與學生關聯的外鍵       |
| created_at   | timestamp | 建立時間             |
| updated_at   | timestamp | 更新時間             |

### 索引
- PRIMARY KEY (course_id, student_id)
- FOREIGN KEY (course_id) REFERENCES courses(id)
- FOREIGN KEY (student_id) REFERENCES students(id)

此設計允許：
1. 講師 (teachers) 可透過 email + 密碼登入。
2. 學生 (students) 可透過 email + 密碼登入，並可在 course_student 建立選課關係。
3. courses 記錄課程與講師的對應關係（teacher_id）。
4. course_student 以複合 PK 避免重複選課。
