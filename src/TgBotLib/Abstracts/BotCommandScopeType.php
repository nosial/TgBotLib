<?php

    namespace TgBotLib\Abstracts;

    abstract class BotCommandScopeType
    {
        const Default = 'default';
        const AllPrivateChats = 'all_private_chats';
        const AllGroupChats = 'all_group_chats';
        const AllChatAdministrators = 'all_chat_administrators';
        const Chat = 'chat';
        const ChatAdministrators = 'chat_administrators';
        const ChatMember = 'chat_member';
    }