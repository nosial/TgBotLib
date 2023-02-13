<?php

    namespace TgBotLib\Abstracts;

    abstract class ChatMemberStatus
    {
        const Creator = 'creator';
        const Administrator = 'administrator';
        const Member = 'member';
        const Restricted = 'restricted';
        const Left = 'left';
        const Kicked = 'kicked';
    }