<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\InputMedia\InputMediaPhoto;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class SendMediaGroupTest extends TestCase
{
    const string TEST_IMAGE_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'oj_simpson.png';
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
    public function testSendMediaGroup(): void
    {
        $result = self::$bot->sendMediaGroup(
            chat_id: TEST_CHAT_ID,
            media: [
                (new InputMediaPhoto())->setMedia(self::TEST_IMAGE_PATH),
                (new InputMediaPhoto())->setMedia(self::TEST_IMAGE_PATH)
            ]
        );

        $this->assertIsArray($result);

        foreach ($result as $message)
        {
            $this->assertInstanceOf(Message::class, $message);
        }
    }

}
