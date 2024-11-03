<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Events\BusinessConnectionEvent;
    use TgBotLib\Events\BusinessMessageEvent;
    use TgBotLib\Events\CallbackQueryEvent;
    use TgBotLib\Events\ChannelPostEvent;
    use TgBotLib\Events\ChatBoostEvent;
    use TgBotLib\Events\ChatJoinRequestEvent;
    use TgBotLib\Events\ChatMemberUpdatedEvent;
    use TgBotLib\Events\ChosenInlineResultEvent;
    use TgBotLib\Events\DeletedBusinessMessagesEvent;
    use TgBotLib\Events\EditedBusinessMessageEvent;
    use TgBotLib\Events\EditedChannelPostEvent;
    use TgBotLib\Events\EditedMessageEvent;
    use TgBotLib\Events\InlineQueryEvent;
    use TgBotLib\Events\MessageReactionCountEvent;
    use TgBotLib\Events\MessageReactionEvent;
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
        case CALLBACK_QUERY = CallbackQueryEvent::class;
        case CHOSEN_INLINE_RESULT = ChosenInlineResultEvent::class;
        case INLINE_QUERY = InlineQueryEvent::class;
        case MESSAGE_REACTION_COUNT = MessageReactionCountEvent::class;
        case MESSAGE_REACTION = MessageReactionEvent::class;
        case DELETED_BUSINESS_MESSAGES = DeletedBusinessMessagesEvent::class;
        case EDITED_BUSINESS_MESSAGE = EditedBusinessMessageEvent::class;
        case BUSINESS_MESSAGE = BusinessMessageEvent::class;
        case BUSINESS_CONNECTION = BusinessConnectionEvent::class;
        case EDITED_CHANNEL_POST = EditedChannelPostEvent::class;
        case CHANNEL_POST = ChannelPostEvent::class;
        case EDITED_MESSAGE = EditedMessageEvent::class;
    }
