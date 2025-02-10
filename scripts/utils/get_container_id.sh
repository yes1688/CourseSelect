#!/bin/bash
# 此腳本用於根據容器名稱獲取容器的ID

# 容器的名稱
CONTAINER_NAME="$1"

if [ -z "$CONTAINER_NAME" ]; then  # 如果容器名稱為空
    echo "使用方法：$0 <container_name>"  # 輸出使用方法
    exit 1  # 退出腳本
fi

# 使用 podman 列出所有容器，然後使用 grep 和 awk 篩選出指定名稱的容器的ID
podman container list --format "table {{.ID}}\t{{.Names}}" | grep "$CONTAINER_NAME" | awk '{print $1}'