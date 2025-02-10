#!/bin/bash
# 此腳本用於檢查指定容器中的 queue:work 進程狀態。
# 它會匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數。
# 腳本會獲取容器ID，並執行檢查進程的命令，然後顯示結果。

# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh

# 容器的名稱
CONTAINER_NAME="courseselect_php"
# 工作目錄
WORK_DIR="/www"
# 檢查進程的命令
CHECK_COMMAND="pgrep -f 'queue:work'"

# 獲取容器ID
CONTAINER_ID=$(../utils/get_container_id.sh "$CONTAINER_NAME")

if [ -n "$CONTAINER_ID" ]; then
    echo "警告，進程編號可能是當前查詢的進程編號，而不是 queue:work 的進程編號。"
    echo "Container ID: $CONTAINER_ID"
    # 執行命令
    execute_command "$CHECK_COMMAND"
    read -p "Press Enter to continue..."
else
    echo "Container not found."
fi
