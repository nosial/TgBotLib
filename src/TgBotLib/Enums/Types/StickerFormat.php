<?php

    namespace TgBotLib\Enums\Types;

    enum StickerFormat : string
    {
        case STATIC = 'static';
        case ANIMATED = 'animated';
        case VIDEO = 'video';
    }