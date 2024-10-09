<?php
    require 'ncc';

    $token_path = __DIR__ . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'token.txt';

    if(!file_exists($token_path))
    {
        throw new Exception(sprintf('The token file "%s" does not exist.', $token_path));
    }

    define('BOT_TOKEN', trim(file_get_contents($token_path)));
    const TEST_CHAT_ID = -1001301191379;

    import('net.nosial.tgbotlib');