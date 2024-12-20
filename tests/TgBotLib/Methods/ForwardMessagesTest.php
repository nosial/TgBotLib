<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\MessageId;

class ForwardMessagesTest extends TestCase
{
    private static Bot $bot;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
        self::$bot->setAutoRetry(true);
    }

    /**
     * Tests the `sendMessage` function of the bot instance.
     *
     * @return void
     */
    public function testForwardMessage(): void
    {
        $message1 = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'This is a test message.'
        );

        $message2 = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'This is another test message.'
        );

        $result = self::$bot->forwardMessages(
            chat_id: TEST_CHAT_ID,
            from_chat_id: TEST_CHAT_ID,
            message_ids: [$message1->getMessageId(), $message2->getMessageId()]
        );

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        foreach ($result as $messageId)
        {
            $this->assertInstanceOf(MessageId::class, $messageId);
        }
    }
}
