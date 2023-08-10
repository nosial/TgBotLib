# Changelog

All notable changes to this project will be documented in this file.
The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [6.7.0] - Unreleased

This update accompanies the release of the [Telegram Bot API 6.7](https://core.telegram.org/bots/api#april-21-2023).
Additionally, this update includes some bug fixes and improvements such as the ability for some objects to be treated as
input objects for methods that require input objects.

### Added
 * Added object `\TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent` to represent the content of a text message to be sent as the result of an inline query.
 * Added object `\TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent` to represent the content of a location message to be sent as the result of an inline query.
 * Added object `\TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent` to represent the content of a venue message to be sent as the result of an inline query.
 * Added object `\TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent` to represent the content of a contact message to be sent as the result of an inline query.
 * Added object `\TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent` to represent the content of an invoice message to be sent as the result of an inline query.
 * Added new exception class `NotImplementedException` to represent the case when a method is not implemented yet or the method is not applicable to the current object.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultArticle`, see [InlineQueryResultArticle](https://core.telegram.org/bots/api#inlinequeryresultarticle) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultPhoto`, see [InlineQueryResultPhoto](hthttps://git.n64.cc/nosial/libs/tgbot/-/issues/3https://git.n64.cc/nosial/libs/tgbot/-/issues/3tps://core.telegram.org/bots/api#inlinequeryresultphoto) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGif`, see [InlineQueryResultGif](https://core.telegram.org/bots/api#inlinequeryresultgif) for more information.
 * Added abstract class `\TgBotLib\Abstracts\ThumbnailMimeType` to represent the mime type of thumbnail, photo, or a file / sticker thumbnail.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultMpeg4Gif`, see [InlineQueryResultMpeg4Gif](https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif) for more information.
 * Added field `via_chat_folder_invite_link` to `\TgBotLib\Objects\Telegram\ChatMemberUpdated` to represent the invite link, which was used by the user to join the chat; for joining by invite link events only.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVideo`, see [InlineQueryResultVideo](https://core.telegram.org/bots/api#inlinequeryresultvideo) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultAudio`, see [InlineQueryResultAudio](https://core.telegram.org/bots/api#inlinequeryresultaudio) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVoice`, see [InlineQueryResultVoice](https://core.telegram.org/bots/api#inlinequeryresultvoice) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultDocument`, see [InlineQueryResultDocument](https://core.telegram.org/bots/api#inlinequeryresultdocument) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultLocation`, see [InlineQueryResultLocation](https://core.telegram.org/bots/api#inlinequeryresultlocation) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVenue`, see [InlineQueryResultVenue](https://core.telegram.org/bots/api#inlinequeryresultvenue) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultContact`, see [InlineQueryResultContact](https://core.telegram.org/bots/api#inlinequeryresultcontact) for more information.
 * Added object `\TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGame`, see [InlineQueryResultGame](https://core.telegram.org/bots/api#inlinequeryresultgame) for more information.
 * Added class `\TgBotLib\Objects\Telegram\InlineQueryResult` which is the base class for all inline query results, additionally added `\TgBotLib\Abstracts\InlineQueryResultType` to represent the type of inline query result object.
 * Added method `\TgBotLib\Bot::answerWebAppQuery` to answer a callback query sent from a web app, which returns the newly added `\TgBotLib\Objects\Telegram\SentWebAppMessage` object on success.
 * Implemented Telegram's currency API `\TgBotLib\Classes\Utilities::getCurrency` to get basic information about the currency of the specified country, see [Telegram's currency API](https://core.telegram.org/bots/payments) for more information.

### Changed
 * Refactored InputMessageContent types to its own namespace so InputMessageContent can always return the correct InputMessageContent object type when calling `fromArray()`
 * Added methods `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setUrl`, `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setText`, `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setCallbackData`,
   `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setWebApp`, `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setLoginUrl`,
   `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setSwitchInlineQuery`, `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setSwitchInlineQueryCurrentChat`,
   `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setCallbackGame`,  `\TgBotLib\Objects\Telegram\InlineKeyboardButton::setPay`
   to `\TgBotLib\Objects\Telegram\InlineKeyboardButton`
 * Added methods `\TgBotLib\Objects\Telegram\InlineKeyboardMarkup::removeRow` & `\TgBotLib\Objects\Telegram\InlineKeyboardMarkup::addRow` to `\TgBotLib\Objects\Telegram\InlineKeyboardMarkup`
 * Added method `\TgBotLib\Objects\Telegram\WebAppInfo::setUrl` to `\TgBotLib\Objects\Telegram\WebAppInfo`
 * Added methods `\TgBotLib\Classes\Validate::url`, `\TgBotLib\Classes\Validate::length`, & `\TgBotLib\Classes\Validate::isHttps` to `\TgBotLib\Classes\Validate`
 * Updated documentation for `\TgBotLib\Bot::editMessageMedia`
 * Renamed namespace from `\TgBotLib\Abstracts` to `\TgBotLib\Enums`
 * Updated class type to `final class` in `\TgBotLib\Enums > BotCommandScopeType`
 * Updated class type to `final class` in `\TgBotLib\Enums >  ChatActionType`
 * Updated class type to `final class` in `\TgBotLib\Enums > ChatMemberStatus`
 * Updated class type to `final class` in `\TgBotLib\Enums > ChatType`
 * Updated class type to `final class` in `\TgBotLib\Enums > EventType`
 * Updated class type to `final class` in `\TgBotLib\Enums > InlineQueryResultType`
 * Updated class type to `final class` in `\TgBotLib\Enums > InputMediaType`
 * Updated class type to `final class` in `\TgBotLib\Enums > InputButtonType`
 * Updated class type to `final class` in `\TgBotLib\Enums > MessageEntityType`
 * Updated class type to `final class` in `\TgBotLib\Enums > PassportElementType`
 * Updated class type to `final class` in `\TgBotLib\Enums > PollType`
 * Updated class type to `final class` in `\TgBotLib\Enums > StickerFormat`
 * Updated class type to `final class` in `\TgBotLib\Enums > StickerType`
 * Updated class type to `final class` in `\TgBotLib\Enums > ThumbnailMimeType`
 * Updated class type to `final class` in `\TgBotLib\Enums > UpdateEventType`
 * Updated method `\TgBotLib > Bot > handleGetUpdates()` to handle exceptions
 * Updated README.md to reflect the new changes with TamerLib 2.+


### Fixed
 * Fixed type in `\TgBotLib\Objects\Telegram > Message > fromArray()` where `forum_topic_created` is being parsed for
   forum_topic_edited instead of `forum_topic_edited`



## [6.6.0] - 2023-04-10

This update accompanies the release of the [Telegram Bot API 6.6](https://core.telegram.org/bots/api#march-9-2023).

### Added
 * Added the ability to set different bot descriptions for different user languages using the method `\TgBotLib\Bot\setMyDescription()`
   see [setMyDescription](https://core.telegram.org/bots/api#setmydescription) for more information.
 * Added the ability to get the current bot description in the given language as the class [BotDescription](https://core.telegram.org/bots/api#botdescription)
   using the method `\TgBotLib\Bot\getMyDescription()` see [getMyDescription](https://core.telegram.org/bots/api#getmydescription) for more information.
 * Added the ability to set different bot short descriptions for different user languages using the method `\TgBotLib\Bot\setMyShortDescription()`
   see [setMyShortDescription](https://core.telegram.org/bots/api#setmyshortdescription) for more information.
 * Added the ability to get the current bot short description in the given language as the class [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription)
   using the method `\TgBotLib\Bot\getMyShortDescription()` see [getMyShortDescription](https://core.telegram.org/bots/api#getmyshortdescription) for more information.
 * Added method `\TgBotLib\Bot\sendSticker()` to send a sticker to a chat. See [sendSticker](https://core.telegram.org/bots/api#sendsticker) for more information.
 * Added method `\TgBotLib\Bot\createNewStickerSet()` to create a new sticker set owned by a user. See [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset) for more information.
 * Added the field _needs_repainting_ to the [Sticker](https://core.telegram.org/bots/api#sticker) class
   which can be obtained via `TgBotLib\Objects\Telegram\Sticker\needsRepainting()`
 * Added method `\TgBotLib\Bot\addStickerToSet()` to add a new sticker to a set created by the bot. 
   See [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset) for more information.
 * Added abstract class `\TgBotLib\Abstracts\StickerFormat` to represent a sticker format ("`static`", "`animated`" or "`video`")
 * Added method `\TgBotLib\Bot\uploadStickerFile()` to upload a sticker file with a sticker for later use in `createNewStickerSet` and `addStickerToSet` methods (can be used multiple times). 
   See [uploadStickerFile](https://core.telegram.org/bots/api#uploadstickerfile) for more information.
 * Added method `\TgBotLib\Bot\setCustomEmojiStickerSetThumbnail()` to set the thumbnail of a sticker set. 
   See [setCustomEmojiStickerSetThumbnail](https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail) for more information.
 * Added object `\TgBotLib\Objects\Telegram\StickerSet` to represent a sticker set.
 * Added method `\TgBotLib\Bot\setStickerSetThumbnail()` to set the thumbnail of a sticker set. 
   See [setStickerSetThumbnail](https://core.telegram.org/bots/api#setstickersetthumbnail) for more information.
 * Added method `\TgBotLib\Bot\setStickerSetTitle()` to set the title of a sticker set. 
   See [setStickerSetTitle](https://core.telegram.org/bots/api#setstickersettitle) for more information.
 * Added method `\TgBotLib\Bot\deleteStickerSet()` to delete a sticker set. 
   See [deleteStickerSet](https://core.telegram.org/bots/api#deletestickerset) for more information.
 * Added method `\TgBotLib\Bot\setStickerEmojiList()` to set the list of emojis for a sticker set. 
   See [setStickerEmojiList](https://core.telegram.org/bots/api#setstickeremojilist) for more information.
 * Added method `\TgBotLib\Bot\setStickerKeywords()` to set the list of emojis for a sticker set. 
   See [setStickerKeywords](https://core.telegram.org/bots/api#setstickerkeywords) for more information.
 * Added method `\TgBotLib\Bot\setStickerMaskPosition()` to change the mask position of a mask sticker. 
   See [setStickerMaskPosition](https://core.telegram.org/bots/api#setstickermaskposition) for more information.

### Changed
 * Removed unused `__destruct()` method from `\TgBotLib\Bot`
 * Added proper construction for `PollOption[]` objects in `TgBotLib\Objects\Telegram\Poll`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\Animation` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\Audio` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\Document` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\Sticker` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\Video` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram\VideoNote` to `thumbnail`

### Fixed
 * Fixed `TgBotLib\Objects\Telegram\Sticker\toArray()` to properly return the `premium_animation` field

## [6.5.2] - 2023-02-26

### Added
 * Added dependency `net.nosial.tempfile` to create temporary files when uploading content from memory.
 * Added `\TgBotLib\Abstracts\ChatActionType`
 * Added logging events to `\TgBotLib\Bot\handleUpdate()`

### Fixed
 * Fixed file uploads when trying to upload content from memory.


## [6.5.1] - 2023-02-23

### Fixed
 * Added a null-safe check for `Poll`'s `explanation_entities` field. [#1](https://git.n64.cc/nosial/libs/tgbot/-/issues/1)


## [6.5.0] - 2023-02-20

### Added
 * First Release