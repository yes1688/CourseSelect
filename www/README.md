# 學生選課管理系統 (Laravel 11)

## 專案簡介
- 透過 Laravel 11 建構一個學生選課系統，提供課程及講師 CRUD 功能。
- 主要資料結構：
  - 課程：課程名稱、簡介、上課時間（hhmm 格式）等
  - 講師：姓名、email

## 專案目錄結構 (初步)
- /app
- /config
- /database
- /routes

## RESTful API (CRUD)
1. 課程列表 API (Read)
2. 授課講師列表 API (Read)
3. 指定講師開課的課程列表 API (Read)
4. 新增講師 API (Create)
5. 新增課程 API (Create)
6. 更新課程 API (Update)
7. 刪除課程 API (Delete)

## Migrations 說明

專案利用 Laravel migration 建立下列主要資料表：
1. teachers 表：儲存講師資料（姓名、email、密碼），email 設唯一索引以利登入驗證。
2. students 表：儲存學生資料（姓名、email、密碼），email 設唯一索引。
3. courses 表：儲存課程資料（課程名稱、簡介、上課時間、下課時間）以及關聯講師（teacher_id 外鍵）。
4. course_student 表：儲存學生選課記錄，建立學生與課程的多對多關係，並以複合索引避免重複選課。

## Swagger 文件產生與 L5-Swagger 安裝說明

專案使用 L5-Swagger 套件自動產生 API 文件，安裝與設定步驟如下：

1. 使用 composer 安裝：
   ```
   composer require "darkaonline/l5-swagger"
   ```
2. 發佈套件設定：
   ```
   php artisan vendor:publish --provider="L5Swagger\L5SwaggerServiceProvider"
   ```
3. 產生 Swagger 文件：
   ```
   php artisan l5-swagger:generate
   ```
4. 在瀏覽器開啟 <http://your-domain/api/documentation> 檢視文件，可將產生的 swagger.json 載入 https://editor.swagger.io 進行編輯。
