<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Objects\ForceReply;
use TgBotLib\Objects\InlineKeyboardButton;
use TgBotLib\Objects\InlineKeyboardMarkup;
use TgBotLib\Objects\KeyboardButton;
use TgBotLib\Objects\LinkPreviewOptions;
use TgBotLib\Objects\Message;
use TgBotLib\Objects\ReplyKeyboardMarkup;
use TgBotLib\Objects\ReplyKeyboardRemove;

class SendMessageTest extends TestCase
{
    const string TEST_WEB_PREVIEW_URL = "https://www.youtube.com/watch?v=tDacjrSCeq4";
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
    public function testSendMessage(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testSendMessage'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
        $this->assertEquals('Test Unit: testSendMessage', $result->getText());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with various Markdown V2 formatting options.
     *
     * The message includes examples of bold text, italic text, a hyperlink, inline code, block code,
     * a user mention, a hashtag, a username mention, and a cashtag.
     *
     * @return void
     */
    public function testSendParseMarkdown2Test(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testSendParseMarkdown2Test' . PHP_EOL . PHP_EOL .
                ' *bold* _italic_ [link](https://example.com)' . PHP_EOL .
                ' `inline code` ```block code```' . PHP_EOL .
                ' [mention](tg://user?id=123456789)' . PHP_EOL .
                ' \#hashtag @username' . PHP_EOL .
                ' $cashtag',
            parse_mode: ParseMode::MARKDOWN_V2
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` function of the bot with multiple Markdown formatting elements.
     *
     * This test sends a message containing bold text, italic text, a hyperlink, inline code,
     * block code, a user mention, a hashtag, a username mention, and a cashtag to verify
     * proper parsing of Markdown formatting.
     *
     * @return void
     */
    public function testSendParseMarkdownTest(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testSendParseMarkdownTest' . PHP_EOL . PHP_EOL .
                ' *bold* _italic_ [link](https://example.com)' . PHP_EOL .
                ' `inline code` ```block code```' . PHP_EOL .
                ' [mention](tg://user?id=123456789)' . PHP_EOL .
                ' \#hashtag @username' . PHP_EOL .
                ' $cashtag',
            parse_mode: ParseMode::MARKDOWN
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with various HTML formatting options.
     *
     * The message includes examples of bold text, italic text, a hyperlink, inline code, block code,
     * a user mention, a username mention, and a cashtag.
     *
     * @return void
     */
    public function testSendParseHTMLTest(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testSendParseHTMLTest' . PHP_EOL . PHP_EOL .
                ' <b>bold</b> <i>italic</i> <a href="https://example.com">link</a>' . PHP_EOL .
                ' <code>inline code</code> <pre>block code</pre>' . PHP_EOL .
                ' <a href="tg://user?id=123456789">mention</a>' . PHP_EOL .
                ' <a href="https://t.me/username">@username</a>' . PHP_EOL .
                ' <a href="https://t.me/cashtag">$cashtag</a>',
            parse_mode: ParseMode::HTML
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality to ensure that link previews are properly disabled.
     *
     * The message contains a URL that should not generate a web page preview. The `LinkPreviewOptions`
     * is configured to disable previews, and the test asserts that the response message does not include a preview.
     *
     * @return void
     */
    public function testWebPagePreviewDisabled(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testWebPagePreview' . PHP_EOL . self::TEST_WEB_PREVIEW_URL . PHP_EOL . PHP_EOL . 'Disabled link preview',
            link_preview_options: (new LinkPreviewOptions())
                ->setDisabled(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with a preference for small media in web page previews.
     *
     * The message includes a test unit identifier and a URL for web preview,
     * and sets the option to prefer small media in the link preview.
     *
     * @return void
     */
    public function testWebPagePreviewPreferSmallMedia(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testWebPagePreview' . PHP_EOL . self::TEST_WEB_PREVIEW_URL . PHP_EOL . PHP_EOL . 'Prefer small media',
            link_preview_options: (new LinkPreviewOptions())
                ->setPreferSmallMedia(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with a webpage preview and a preference for large media.
     *
     * The message includes a URL and a preference setting for large media in the link preview.
     *
     * @return void
     */
    public function testWebPagePreviewPreferLargeMedia(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testWebPagePreview' . PHP_EOL . self::TEST_WEB_PREVIEW_URL . PHP_EOL . PHP_EOL . 'Prefer large media',
            link_preview_options: (new LinkPreviewOptions())
                ->setPreferLargeMedia(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with a web page preview shown above the text.
     *
     * The message includes a URL and demonstrates the configuration for showing the web page preview above the actual text.
     *
     * @return void
     */
    public function testWebPagePreviewShowAboveText(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testWebPagePreview' . PHP_EOL . self::TEST_WEB_PREVIEW_URL . PHP_EOL . PHP_EOL . 'Show above text',
            link_preview_options: (new LinkPreviewOptions())
                ->setShowAboveText(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    public function testKeyboardMarkup(): void
    {
        $replyMarkup = new InlineKeyboardMarkup();
        $replyMarkup->addRow(
            (new InlineKeyboardButton())->setText('Button 1')->setCallbackData('button1'),
            (new InlineKeyboardButton())->setText('Button 2')->setCallbackData('button2')
        );

        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testKeyboardMarkup',
            reply_markup: $replyMarkup
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with a reply markup.
     * The message includes a reply markup with two buttons, and a placeholder text for the input field.
     *
     * @return void
     */
    public function testReplyMarkup(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testReplyMarkup',
            reply_markup: (new ReplyKeyboardMarkup())->addRow(
                (new KeyboardButton())->setText('Button 1'),
                (new KeyboardButton())->setText('Button 2')
            )->setInputFieldPlaceholder('Placeholder')
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());

        // Remove
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testReplyMarkup',
            reply_markup: (new ReplyKeyboardRemove())->setRemoveKeyboard(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }

    /**
     * Tests the `sendMessage` functionality of the bot with a force reply.
     *
     * The message includes a force reply option that requires a reply from the user.
     *
     * @return void
     */
    public function testForceReply(): void
    {
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testForceReply',
            reply_markup: (new ForceReply())->setForceReply(true)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());

        // Clear
        $result = self::$bot->sendMessage(
            chat_id: TEST_CHAT_ID,
            text: 'Test Unit: testForceReply',
            reply_markup: (new ForceReply())->setForceReply(false)
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertEquals(TEST_CHAT_ID, $result->getChat()->getId());
    }
}
