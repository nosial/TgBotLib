<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;

class SendDocumentTest extends TestCase
{
    const string TEST_DOCUMENT_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'password.txt';
    private static Bot $bot;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
        self::$bot->setAutoRetry(true);
    }

    public function testSendDocument(): void
    {
        $result = self::$bot->sendDocument(
            chat_id: TEST_CHAT_ID,
            document: self::TEST_DOCUMENT_PATH,
            caption: 'Test Unit: testSendDocument',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals('Test Unit: testSendDocument', $result->getCaption());
    }
}
