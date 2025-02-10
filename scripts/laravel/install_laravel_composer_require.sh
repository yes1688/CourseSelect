#!/bin/bash
# 此腳本用途為安裝 Laravel 和 Composer 的相依套件
# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh  

# 定義要執行的命令，這裡是安裝 Laravel 和 Composer 的命令
INSTALL_COMMAND="//bin//sh -c \"cd /.; cd www; rm -rf vendor folder; composer install; exit\""

# 使用 execute_command 函數執行上面定義的命令
execute_command "$INSTALL_COMMAND"