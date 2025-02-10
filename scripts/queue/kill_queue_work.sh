#!/bin/bash
# 此腳本用於終止指定容器中的 queue:work 進程。
# 腳本會匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數。
# 容器的名稱由變數 CONTAINER_NAME 指定，終止進程的命令由變數 KILL_COMMAND 指定。

# 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數
source ../utils/execute_command.sh

# 容器的名稱
CONTAINER_NAME="courseselect_php"
# 結束進程的命令
KILL_COMMAND="pgrep -f 'queue:work' | xargs kill"

# 獲取容器ID
CONTAINER_ID=$(../utils/get_container_id.sh "$CONTAINER_NAME")

if [ -n "$CONTAINER_ID" ]; then
    echo "警告，進程編號可能是當前查詢的進程編號，而不是 queue:work 的進程編號。"
    echo "Container ID: $CONTAINER_ID"
    # 執行命令
    execute_command "$KILL_COMMAND"
fi
