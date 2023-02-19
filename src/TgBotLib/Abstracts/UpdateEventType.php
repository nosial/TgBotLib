<?php

    namespace TgBotLib\Abstracts;

    abstract class UpdateEventType
    {
        const GenericUpdate = 'generic_update';

        const Message = 'message';

        const EditedMessage = 'edited_message';
    }