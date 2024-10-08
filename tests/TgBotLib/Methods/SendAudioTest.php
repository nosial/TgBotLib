<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class SendAudioTest extends TestCase
{
    const string TEST_AUDIO_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'ketchup.mp3';
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
    public function testSendAudio(): void
    {
        $result = self::$bot->sendAudio(
            chat_id: TEST_CHAT_ID,
            audio: self::TEST_AUDIO_PATH,
            caption: 'Test Unit: testSendAudio',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals('Test Unit: testSendAudio', $result->getCaption());
    }

}
