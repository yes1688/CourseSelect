#!/bin/bash
# 此腳本用途：重啟工作器
# 
# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令，這裡是重啟工作器的命令
RESTART_WORKER_COMMAND="php artisan queue:restart"

# 使用 execute_command 函數執行上面定義的命令
execute_command "$RESTART_WORKER_COMMAND"

# 定義要執行的命令，這裡是啟動工作器的命令
START_WORKER_COMMAND="php artisan queue:listen --queue='high,default'"

# 使用 execute_command 函數執行上面定義的命令
execute_command "$START_WORKER_COMMAND"