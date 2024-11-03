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
        case MESSAGE = MessageEvent::class;

        /**
         * Determines the type of event based on the provided Update object.
         *
         * @param Update $update The update object containing event details.
         * @return UpdateEventType The type of event detected from the update.
         */
        public static function determineEventType(Update $update): UpdateEventType
        {
            if($update->getRemovedChatBoost() !== null)
            {
                return UpdateEventType::REMOVED_CHAT_BOOST_EVENT;
            }

            if($update->getChatBoost() !== null)
            {
                return UpdateEventType::CHAT_BOOST_EVENT;
            }

            if($update->getChatJoinRequest() !== null)
            {
                return UpdateEventType::CHAT_JOIN_REQUEST_EVENT;
            }

            if($update->getChatMember() !== null)
            {
                return UpdateEventType::CHAT_MEMBER_UPDATED;
            }

            if($update->getMyChatMember() !== null)
            {
                return UpdateEventType::MY_CHAT_MEMBER_UPDATED;
            }

            if($update->getPollAnswer() !== null)
            {
                return UpdateEventType::POLL_ANSWER;
            }

            if($update->getPoll() !== null)
            {
                return UpdateEventType::POLL;
            }

            if($update->getPurchasedPaidMedia() !== null)
            {
                return UpdateEventType::PAID_MEDIA_PURCHASED;
            }

            if($update->getPreCheckoutQuery() !== null)
            {
                return UpdateEventType::PRE_CHECKOUT_QUERY;
            }

            if($update->getPreCheckoutQuery() !== null)
            {
                return UpdateEventType::PRE_CHECKOUT_QUERY;
            }

            if($update->getCallbackQuery() !== null)
            {
                return UpdateEventType::CALLBACK_QUERY;
            }

            if($update->getChosenInlineResult() !== null)
            {
                return UpdateEventType::CHOSEN_INLINE_RESULT;
            }

            if($update->getInlineQuery() !== null)
            {
                return UpdateEventType::INLINE_QUERY;
            }

            if($update->getMessageReactionCount() !== null)
            {
                return UpdateEventType::MESSAGE_REACTION_COUNT;
            }

            if($update->getMessageReaction() !== null)
            {
                return UpdateEventType::MESSAGE_REACTION;
            }

            if($update->getDeletedBusinessMessages() !== null)
            {
                return UpdateEventType::DELETED_BUSINESS_MESSAGES;
            }

            if($update->getEditedBusinessMessage() !== null)
            {
                return UpdateEventType::EDITED_BUSINESS_MESSAGE;
            }

            if($update->getBusinessMessage() !== null)
            {
                return UpdateEventType::BUSINESS_MESSAGE;
            }

            if($update->getBusinessConnection() !== null)
            {
                return UpdateEventType::BUSINESS_CONNECTION;
            }

            if($update->getEditedChannelPost() !== null)
            {
                return UpdateEventType::EDITED_CHANNEL_POST;
            }

            if($update->getChannelPost() !== null)
            {
                return UpdateEventType::CHANNEL_POST;
            }

            if($update->getEditedMessage() !== null)
            {
                return UpdateEventType::EDITED_MESSAGE;
            }

            if($update->getMessage() !== null)
            {
                return UpdateEventType::MESSAGE;
            }

            return UpdateEventType::UPDATE_EVENT;
        }
    }
