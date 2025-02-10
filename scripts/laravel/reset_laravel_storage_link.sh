#!/bin/bash

# 此腳本用途是重置 Laravel 專案中的 storage link。
# 它會匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數，
# 並使用該函數執行指定的命令來重置 link。

source ../utils/execute_command.sh

# 定義要執行的命令，這裡是重置 link 的命令
RESET_LINK_COMMAND="//bin//sh -c \"cd /.; cd www; rm -rf public/storage folder; php artisan storage:link; exit\""

# 使用 execute_command 函數執行上面定義的命令
execute_command "$RESET_LINK_COMMAND"