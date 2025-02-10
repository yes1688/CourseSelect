#!/bin/bash
# 這個腳本用於執行異常數據作業測試
# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令
TEST_FILTER_COMMAND="CreateMissMessageAbnormalDataJobTest::testJob" # 測試過濾命令
TEST_COMMAND="php artisan test --filter $TEST_FILTER_COMMAND"             # 測試命令

# 使用 execute_command 函數執行上面定義的命令
execute_command "$TEST_COMMAND"