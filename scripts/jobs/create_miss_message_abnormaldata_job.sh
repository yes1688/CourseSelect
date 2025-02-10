#!/bin/bash
# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令，這裡是創建工作的命令
CREATE_JOB_COMMAND='php artisan tinker --execute="dispatch(new \App\Jobs\CreateMissMessageAbnormalDataJob())->onQueue(\"default\")->delay(now()->addSeconds(3));"'

# 使用 execute_command 函數執行上面定義的命令
execute_command "$CREATE_JOB_COMMAND"