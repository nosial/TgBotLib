<?php

    namespace TgBotLib\Enums\Types;

    enum StickerType : string
    {
        case REGULAR = 'regular';

        case MASK = 'mask';

        case CUSTOM_EMOJI = 'custom_emoji';
    }