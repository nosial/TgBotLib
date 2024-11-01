<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Events\ChatBoostEvent;
    use TgBotLib\Events\ChatJoinRequestEvent;
    use TgBotLib\Events\RemovedChatBoostEvent;

    enum EventType : string
    {
        case UPDATE_EVENT = UpdateEvent::class;
        case REMOVED_CHAT_BOOST_EVENT = RemovedChatBoostEvent::class;
        case CHAT_BOOST_EVENT = ChatBoostEvent::class;
        case CHAT_JOIN_REQUEST_EVENT = ChatJoinRequestEvent::class;
    }
