<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class SendAnimationTest extends TestCase
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
     * Tests sending an animation file to a specified chat.
     *
     * @return void
     */
    public function testSendAnimation(): void
    {
        $result = self::$bot->sendAnimation(
            chat_id: TEST_CHAT_ID,
            animation: __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'sticker.gif',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }
}
