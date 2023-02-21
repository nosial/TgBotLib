<?php

    // Import ncc
    require 'ncc';

    import('net.nosial.tgbotlib');

    // Require commands & event handlers
    require 'commands' . DIRECTORY_SEPARATOR . 'StartCommand.php';
    require 'commands' . DIRECTORY_SEPARATOR . 'HashCommand.php';