#!/bin/bash
# 此腳本用於在容器中執行測試
# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令
echo "請輸入測試過濾命令（例如：AbnormalDataJobTest::testSendMessageAbnormalDataJob）："
read test_filter_command # 讀取用戶輸入的測試過濾命令
TEST_COMMAND="php artisan test --filter $test_filter_command" # 測試命令

# 使用 execute_command 函數執行上面定義的命令
execute_command "$TEST_COMMAND"