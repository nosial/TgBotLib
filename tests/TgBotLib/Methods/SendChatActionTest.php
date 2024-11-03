<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ChatActionType;

class SendChatActionTest extends TestCase
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
     * Tests the basic `sendVenue` functionality
     *
     * @return void
     */
    public function testTypingAction(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::TYPING
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testUploadPhoto(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::UPLOAD_PHOTO
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testRecordVideo(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::RECORD_VIDEO
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testUploadVideo(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::UPLOAD_VIDEO
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testRecordVoice(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::RECORD_VOICE
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testChooseSticker(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::CHOOSE_STICKER
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testFindLocation(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::FIND_LOCATION
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testRecordVideoNote(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::RECORD_VIDEO_NOTE
        );

        $this->assertIsBool($result);
        sleep(5);
    }

    public function testUploadVideoNote(): void
    {
        $result = self::$bot->sendChatAction(
            chat_id: TEST_CHAT_ID,
            action: ChatActionType::UPLOAD_VIDEO_NOTE
        );

        $this->assertIsBool($result);
        sleep(5);
    }
}