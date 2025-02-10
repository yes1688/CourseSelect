# CourseSelect 專案說明
新增此文件，說明專案整體架構以及學生選課管理系統的初步設計。

## 專案目錄結構

.
├── config/         - 各類配置檔（證書、資料庫、Nginx、PHP）
├── docker-compose.yaml - 容器組態設定檔
└── www/            - 主應用程式目錄 (包括核心程式、資源檔、前端與測試等)

## 開發環境需求

- PHP 8.2+
- 容器工具（Podman/Podman Compose 或 Docker）
- Nginx、MariaDB 等服務配置

## 部署與測試

1. 複製環境設定檔：
   ```bash
   cp www/.env.example www/.env
   ```
2. 啟動容器：
   ```bash
   podman-compose up -d
   ```
3. 安裝依賴與執行遷移：
   ```bash
   podman exec -it [container_id] composer install
   podman exec -it [container_id] php artisan migrate
   ```
4. 安裝前端依賴：
   ```bash
   cd www && npm install
   ```

## 正式機注意事項

- 部署正式機前，請務必重設 .env 檔中的密碼設定，如 APP_PASSWORD、DB_PASSWORD 等。
   ```bash
   cp www/.env.example www/.env
   # 編輯 www/.env，並更新所有密碼相關設定
   ```

## 備註

詳細說明請參考各目錄內相關檔案與說明文件。
