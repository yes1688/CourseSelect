#!/bin/bash
# 進入容器腳本
# 這個腳本用於進入指定容器，並在容器中執行特定命令。

set -e # 如果任何語句的執行結果不是true則應該退出

source ../utils/execute_command.sh # 匯入 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數

# 容器的名稱
CONTAINER_NAME="courseselect_courseselect_php"

# 進入容器的命令
ENTER_COMMAND="//bin//bash -c \"cd /www; exec //bin//sh\"" # 這個命令會在容器中執行，首先切換到 /www 目錄，然後啟動一個新的 shell

# 獲取容器ID
CONTAINER_ID=$(../utils/get_container_id.sh "$CONTAINER_NAME") # 調用 get_container_id.sh 腳本來獲取容器ID

if [ -n "$CONTAINER_ID" ]; then # 如果容器ID存在
    echo "容器ID: $CONTAINER_ID"  # 輸出容器ID
    # 執行命令
    if ! execute_command "$ENTER_COMMAND"; then # 如果執行命令失敗
        echo "執行命令失敗: $ENTER_COMMAND"           # 輸出錯誤信息
        exit 1                                  # 退出腳本
    fi
    read -p "按 Enter 繼續..." # 提示用戶按 Enter 繼續
else                        # 如果容器ID不存在
    echo "找不到容器。"           # 輸出錯誤信息
    exit 1                  # 退出腳本
fi
