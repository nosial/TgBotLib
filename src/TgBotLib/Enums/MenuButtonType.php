<?php

    namespace TgBotLib\Enums;

    enum MenuButtonType : string
    {
        case COMMANDS = 'commands';
        case WEB_APP = 'web_app';
        case DEFAULT = 'default';
    }