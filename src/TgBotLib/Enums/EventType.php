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
    use TgBotLib\Events\CommandEvent;
    use TgBotLib\Events\DeletedBusinessMessagesEvent;
    use TgBotLib\Events\EditedBusinessMessageEvent;
    use TgBotLib\Events\EditedChannelPostEvent;
    use TgBotLib\Events\EditedMessageEvent;
    use TgBotLib\Events\InlineQueryEvent;
    use TgBotLib\Events\MessageEvent;
    use TgBotLib\Events\MessageReactionCountEvent;
    use TgBotLib\Events\MessageReactionEvent;
    use TgBotLib\Events\MyChatMemberUpdatedEvent;
    use TgBotLib\Events\PollAnswerEvent;
    use TgBotLib\Events\PollEvent;
    use TgBotLib\Events\PaidMediaPurchasedEvent;
    use TgBotLib\Events\PreCheckoutQueryEvent;
    use TgBotLib\Events\RemovedChatBoostEvent;
    use TgBotLib\Events\ShippingQueryEvent;
    use TgBotLib\Objects\Update;

    enum EventType : string
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
        case MESSAGE = MessageEvent::class;
        case COMMAND = CommandEvent::class;

        /**
         * Determines the type of event based on the provided Update object.
         *
         * @param Update $update The update object containing event details.
         * @return EventType The type of event detected from the update.
         */
        public static function determineEventType(Update $update): EventType
        {
            if($update->getRemovedChatBoost() !== null)
            {
                return EventType::REMOVED_CHAT_BOOST_EVENT;
            }

            if($update->getChatBoost() !== null)
            {
                return EventType::CHAT_BOOST_EVENT;
            }

            if($update->getChatJoinRequest() !== null)
            {
                return EventType::CHAT_JOIN_REQUEST_EVENT;
            }

            if($update->getChatMember() !== null)
            {
                return EventType::CHAT_MEMBER_UPDATED;
            }

            if($update->getMyChatMember() !== null)
            {
                return EventType::MY_CHAT_MEMBER_UPDATED;
            }

            if($update->getPollAnswer() !== null)
            {
                return EventType::POLL_ANSWER;
            }

            if($update->getPoll() !== null)
            {
                return EventType::POLL;
            }

            if($update->getPurchasedPaidMedia() !== null)
            {
                return EventType::PAID_MEDIA_PURCHASED;
            }

            if($update->getPreCheckoutQuery() !== null)
            {
                return EventType::PRE_CHECKOUT_QUERY;
            }

            if($update->getShippingQuery() !== null)
            {
                return EventType::SHIPPING_QUERY;
            }

            if($update->getCallbackQuery() !== null)
            {
                return EventType::CALLBACK_QUERY;
            }

            if($update->getChosenInlineResult() !== null)
            {
                return EventType::CHOSEN_INLINE_RESULT;
            }

            if($update->getInlineQuery() !== null)
            {
                return EventType::INLINE_QUERY;
            }

            if($update->getMessageReactionCount() !== null)
            {
                return EventType::MESSAGE_REACTION_COUNT;
            }

            if($update->getMessageReaction() !== null)
            {
                return EventType::MESSAGE_REACTION;
            }

            if($update->getDeletedBusinessMessages() !== null)
            {
                return EventType::DELETED_BUSINESS_MESSAGES;
            }

            if($update->getEditedBusinessMessage() !== null)
            {
                return EventType::EDITED_BUSINESS_MESSAGE;
            }

            if($update->getBusinessMessage() !== null)
            {
                return EventType::BUSINESS_MESSAGE;
            }

            if($update->getBusinessConnection() !== null)
            {
                return EventType::BUSINESS_CONNECTION;
            }

            if($update->getEditedChannelPost() !== null)
            {
                return EventType::EDITED_CHANNEL_POST;
            }

            if($update->getChannelPost() !== null)
            {
                return EventType::CHANNEL_POST;
            }

            if($update->getEditedMessage() !== null)
            {
                return EventType::EDITED_MESSAGE;
            }

            if($update->getMessage() !== null)
            {
                return EventType::MESSAGE;
            }

            return EventType::UPDATE_EVENT;
        }
    }
