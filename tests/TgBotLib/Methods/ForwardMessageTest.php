<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\Message;

class ForwardMessageTest extends TestCase
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
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testForwardMessage'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('Test Unit: testForwardMessage', $result->getText());

        $result = self::$bot->forwardMessage(
            chat_id: TEST_CHAT_ID,
            from_chat_id: TEST_CHAT_ID,
            message_id: $result->getMessageId()
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('Test Unit: testForwardMessage', $result->getText());
    }
}
