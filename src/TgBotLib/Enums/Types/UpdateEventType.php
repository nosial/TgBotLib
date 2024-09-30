<?php

    namespace TgBotLib\Enums\Types;

    enum UpdateEventType : string
    {
        case GENERIC_UPDATE = 'generic_update';

        case MESSAGE = 'message';

        case EDITED_MESSAGE = 'edited_message';
    }