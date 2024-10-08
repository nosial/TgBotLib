<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;
use TgBotLib\Objects\MessageId;

class CopyMessagesTest extends TestCase
{
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
    public function testCopyMessage(): void
    {
        $message1 = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: "Test Message 1"
        );

        $message2 = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: "Test Message 2"
        );

        $result = self::$bot->copyMessages(
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
