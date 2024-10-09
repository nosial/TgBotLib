<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class SendPhotoTest extends TestCase
{
    const string TEST_IMAGE_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'oj_simpson.png';
    const string TEST_IMAGE_URL = 'https://avatars.githubusercontent.com/u/22669599';
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
    public function testSendPhoto(): void
    {
        $result = self::$bot->sendPhoto(
            chat_id: TEST_CHAT_ID,
            photo: self::TEST_IMAGE_PATH,
            caption: 'Test Unit: testSendPhoto',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals('Test Unit: testSendPhoto', $result->getCaption());
    }

    /**
     * Tests the `sendPhoto` function of the bot instance with a URL.
     *
     * @return void
     */
    public function testSendPhotoWithUrl(): void
    {
        $result = self::$bot->sendPhoto(
            chat_id: TEST_CHAT_ID,
            photo: self::TEST_IMAGE_URL,
            caption: 'Test Unit: testSendPhotoWithUrl',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals('Test Unit: testSendPhotoWithUrl', $result->getCaption());
    }
}
