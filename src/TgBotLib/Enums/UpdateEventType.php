<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Events\ChatBoostEvent;
    use TgBotLib\Events\ChatJoinRequestEvent;
    use TgBotLib\Events\ChatMemberUpdatedEvent;
    use TgBotLib\Events\MyChatMemberUpdatedEvent;
    use TgBotLib\Events\PollAnswerEvent;
    use TgBotLib\Events\PollEvent;
    use TgBotLib\Events\PaidMediaPurchasedEvent;
    use TgBotLib\Events\PreCheckoutQueryEvent;
    use TgBotLib\Events\RemovedChatBoostEvent;
    use TgBotLib\Events\ShippingQueryEvent;

    enum UpdateEventType : string
    {
        case UPDATE_EVENT = UpdateEvent::class;
        case REMOVED_CHAT_BOOST_EVENT = RemovedChatBoostEvent::class;
        case CHAT_BOOST_EVENT = ChatBoostEvent::class;
        case CHAT_JOIN_REQUEST_EVENT = ChatJoinRequestEvent::class;
        case CHAT_MEMBER_UPDATED = ChatMemberUpdatedEvent::class;
        case MY_CHAT_MEMBER_UPDATED = MyChatMemberUpdatedEvent::class;
        case POLL_ANSWER = PollAnswerEvent::class;
        case POLL = PollEvent::class;
        case PAID_MEDIA_PURCHASED = PaidMediaPurchasedEvent::class;
        case PRE_CHECKOUT_QUERY = PreCheckoutQueryEvent::class;
        case SHIPPING_QUERY = ShippingQueryEvent::class;
    }
