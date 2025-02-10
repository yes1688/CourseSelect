#!/bin/bash

# 此腳本用於重置翻譯並清除快取

# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令
CLEAR_TABLE_COMMAND="php artisan tinker --execute=\"App\\Models\\NamrPortal\\Translation::truncate();\""
SEED_COMMAND="php artisan db:seed --class=TranslationsTableSeeder"
CLEAR_CACHE_COMMAND="php artisan cache:clear"

# 使用 execute_command 函數執行上面定義的命令
execute_command "$CLEAR_TABLE_COMMAND"
execute_command "$SEED_COMMAND"
execute_command "$CLEAR_CACHE_COMMAND"