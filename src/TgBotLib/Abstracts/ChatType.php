<?php

    namespace TgBotLib\Abstracts;

    abstract class ChatType
    {
        const Private = 'private';
        const Group = 'group';
        const Supergroup = 'supergroup';
        const Channel = 'channel';
    }