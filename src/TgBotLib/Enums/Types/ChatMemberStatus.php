<?php

    namespace TgBotLib\Enums\Types;

    enum ChatMemberStatus : string
    {
        case CREATOR = 'creator';
        case ADMINISTRATOR = 'administrator';
        case MEMBER = 'member';
        case RESTRICTED = 'restricted';
        case LEFT = 'left';
        case KICKED = 'kicked';
    }