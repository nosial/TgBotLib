<?php

    namespace TgBotLib\Enums\Types;

    enum ChatType : string
    {
        case PRIVATE = 'private';
        case GROUP = 'group';
        case SUPERGROUP = 'supergroup';
        case CHANNEL = 'channel';
    }