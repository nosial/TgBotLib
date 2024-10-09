<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Exceptions\TelegramException;
use TgBotLib\Objects\InlineKeyboardButton;
use TgBotLib\Objects\InlineKeyboardMarkup;
use TgBotLib\Objects\Message;
use TgBotLib\Objects\MessageEntity;

class SendVoiceTest extends TestCase
{
    private static Bot $bot;

    /**
     * Set up the bot instance before all tests.
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
    }

    /**
     * Tests sending a voice file to a specified chat.
     *
     * @return void
     */
    public function testSendVoice(): void
    {
        $result = self::$bot->sendVoice(
            chat_id: TEST_CHAT_ID,
            voice: __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'ted.ogg',
            caption: 'Test Unit: testSendVoice',
            duration: 30,
            disable_notification: true
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }


    /**
     * Tests sending a voice file using a URL.
     *
     * @return void
     */
    public function testSendVoiceWithUrl(): void
    {
        $result = self::$bot->sendVoice(
            chat_id: TEST_CHAT_ID,
            voice: 'https://example.com/voice.ogg',
            caption: 'Here is a voice message from a URL',
            duration: 25
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals(25, $result->getVoice()->getDuration());
    }

    /**
     * Tests sending a voice file with caption entities.
     *
     * @return void
     */
    public function testSendVoiceWithCaptionEntities(): void
    {
        $captionEntities = [
            new MessageEntity(type: 'bold', offset: 0, length: 4),
            new MessageEntity(type: 'italic', offset: 5, length: 5)
        ];

        $result = self::$bot->sendVoice(
            chat_id: TEST_CHAT_ID,
            voice: 'https://example.com/voice.ogg',
            caption: 'This is a test',
            caption_entities: $captionEntities
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('This is a test', $result->getCaption());
    }

    /**
     * Tests sending a voice file with custom reply markup.
     *
     * @return void
     */
    public function testSendVoiceWithReplyMarkup(): void
    {
        $replyMarkup = new InlineKeyboardMarkup();
        $replyMarkup->addRow(
            InlineKeyboardButton::fromArray(['text' => 'Button 1', 'callback_data' => 'button1']),
            InlineKeyboardButton::fromArray(['text' => 'Button 2', 'callback_data' => 'button2'])
        );

        try
        {
            $result = self::$bot->sendVoice(
                chat_id: TEST_CHAT_ID,
                voice: __DIR__ . DIRECTORY_SEPARATOR . 'sample' . DIRECTORY_SEPARATOR . 'ted.ogg',
                reply_markup: $replyMarkup
            );

            $this->assertInstanceOf(Message::class, $result);
            $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        }
        catch (TelegramException $e)
        {
            $this->fail('Failed to send voice message: ' . $e->getMessage());
        }
    }

}
