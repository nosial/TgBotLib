<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class ForwardMessageTest extends TestCase
{
    const int TEST_CHAT_ID = -1001301191379;
    private static Bot $bot;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
    }

    /**
     * Tests the `sendMessage` function of the bot instance.
     *
     * @return void
     */
    public function testForwardMessage(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: self::TEST_CHAT_ID,
            text: 'Test Unit: testForwardMessage'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(self::TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('Test Unit: testForwardMessage', $result->getText());

        $result = self::$bot->forwardMessage(
            chat_id: self::TEST_CHAT_ID,
            from_chat_id: self::TEST_CHAT_ID,
            message_id: $result->getMessageId()
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(self::TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('Test Unit: testForwardMessage', $result->getText());
    }
}
