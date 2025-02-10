# 此腳本用於在容器中或本機上執行命令。
# 定義容器名稱和工作目錄
CONTAINER_NAME="courseselect_php"
WORK_DIR="/www"

# 取得容器 ID
CONTAINER_ID=$(source ../utils/get_container_id.sh "$CONTAINER_NAME")

# 在本機上執行命令的函數
execute_command_locally() {
    local COMMAND=$1
    local MATCHING_PHP_PATH="" # 預設為空

    # 切換到 Laravel 項目目錄
    cd ../../www

    # 如果命令需要 PHP，則尋找符合要求的 PHP 版本
    if [[ $COMMAND == *"php "* ]]; then
        # 從 composer.json 文件中讀取需要的 PHP 版本
        REQUIRED_PHP_VERSION=$(cat composer.json | grep -Po '(?<="php": ")[^"]*')
        # 使用 where 命令找出所有的 php.exe 路徑
        PHP_PATHS=$(where php.exe)
        # 遍歷所有的 php.exe 路徑
        for PHP_PATH in $PHP_PATHS; do
            # 獲取 PHP 的版本號
            PHP_VERSION=$("$PHP_PATH" -v | head -n 1 | cut -d " " -f 2 | cut -d "." -f 1,2)
            # 如果 PHP 的版本號大於或等於需要的版本號，則將此路徑保存到 MATCHING_PHP_PATH 變量中，並跳出循環
            if php -r "exit(version_compare('$PHP_VERSION', '$REQUIRED_PHP_VERSION', '<'));"; then
                echo "找到符合要求的 PHP 版本：$PHP_VERSION"
                MATCHING_PHP_PATH="$PHP_PATH"
                break
            fi
        done

        # 如果找不到符合要求的 PHP 版本，則輸出錯誤消息並退出
        if [[ -z "$MATCHING_PHP_PATH" ]]; then
            echo "找不到對應的 PHP 版本。"
            exit 1
        fi

        # 將符合要求的 PHP 路徑用引號包起來
        MATCHING_PHP_PATH="\"$MATCHING_PHP_PATH\""
    fi

    # 如果 MATCHING_PHP_PATH 為空，則直接執行 COMMAND；否則，使用 MATCHING_PHP_PATH 指定的 PHP 執行 COMMAND
    if [[ -z "$MATCHING_PHP_PATH" ]]; then
        echo "執行命令：$COMMAND"
        $COMMAND
    else
        # 只替換 COMMAND 變量開頭的 'php'
        COMMAND=${COMMAND/#php/}
        echo "執行命令：$MATCHING_PHP_PATH $COMMAND"
        eval "$MATCHING_PHP_PATH" $COMMAND
    fi
}

# 執行命令的函數
execute_command() {
    local COMMAND=$1
    echo "$COMMAND"
    # 如果容器 ID 存在，則在容器中執行命令
    if [ -n "$CONTAINER_ID" ]; then
        echo "在容器中執行命令"
        podman exec -it "$CONTAINER_ID" //bin//sh -c "cd $WORK_DIR && $COMMAND"
    else
        # 如果容器 ID 不存在，則在本機執行命令
        echo "在本機執行命令"
        execute_command_locally "$COMMAND"
    fi
}

# 執行composer run clear 的函數
execute_command_for_composer() {
    local COMMAND=$1
    echo "$COMMAND"
    # 如果容器 ID 存在，則在容器中執行命令
    if [ -n "$CONTAINER_ID" ]; then
        echo "在容器中執行命令"
        podman exec -it "$CONTAINER_ID" //bin//sh -c "cd $WORK_DIR; yes | $COMMAND; exit"
    else
        # 如果容器 ID 不存在，則在本機執行命令
        echo "在本機執行命令"
        execute_command_locally "$COMMAND"
    fi
}
