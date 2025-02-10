#!/bin/bash

# 此腳本用於執行 Composer 的 clear 命令。
# 它導入了 execute_command.sh 腳本，該腳本定義了一個名為 execute_command 的函數，
# 並使用該函數執行了 Composer 的 clear 命令。

source ../utils/execute_command.sh

COMPOSER_CLEAR_COMMAND="composer run clear"

execute_command_for_composer "$COMPOSER_CLEAR_COMMAND"