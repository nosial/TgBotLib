# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [6.6.0] - Unreleased

This update accompanies the release of the [Telegram Bot API 6.6](https://core.telegram.org/bots/api#march-9-2023).

### Added
 * Added the ability to set different bot descriptions for different user languages using the method `\TgBotLib\Bot > setMyDescription()`
   see [setMyDescription](https://core.telegram.org/bots/api#setmydescription) for more information.
 * Added the ability to get the current bot description in the given language as the class [BotDescription](https://core.telegram.org/bots/api#botdescription)
   using the method `\TgBotLib\Bot > getMyDescription()` see [getMyDescription](https://core.telegram.org/bots/api#getmydescription) for more information.
 * Added the ability to set different bot short descriptions for different user languages using the method `\TgBotLib\Bot > setMyShortDescription()`
   see [setMyShortDescription](https://core.telegram.org/bots/api#setmyshortdescription) for more information.
 * Added the ability to get the current bot short description in the given language as the class [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription)
   using the method `\TgBotLib\Bot > getMyShortDescription()` see [getMyShortDescription](https://core.telegram.org/bots/api#getmyshortdescription) for more information.
 * Added method `\TgBotLib\Bot > sendSticker()` to send a sticker to a chat. See [sendSticker](https://core.telegram.org/bots/api#sendsticker) for more information.
 * Added method `\TgBotLib\Bot > createNewStickerSet()` to create a new sticker set owned by a user. See [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset) for more information.
 * Added the field _needs_repainting_ to the [Sticker](https://core.telegram.org/bots/api#sticker) class
   which can be obtained via `TgBotLib\Objects\Telegram > Sticker > needsRepainting()`
 * Added method `\TgBotLib\Bot > addStickerToSet()` to add a new sticker to a set created by the bot. 
   See [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset) for more information.
 * Added abstract class `\TgBotLib\Abstracts > StickerFormat` to represent a sticker format ("`static`", "`animated`" or "`video`")
 * Added method `\TgBotLib\Bot > uploadStickerFile()` to upload a sticker file with a sticker for later use in `createNewStickerSet` and `addStickerToSet` methods (can be used multiple times). 
   See [uploadStickerFile](https://core.telegram.org/bots/api#uploadstickerfile) for more information.
 * Added method `\TgBotLib\Bot > setCustomEmojiStickerSetThumbnail()` to set the thumbnail of a sticker set. 
   See [setCustomEmojiStickerSetThumbnail](https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail) for more information.
 * Added object `\TgBotLib\Objects\Telegram > StickerSet` to represent a sticker set.
 * Added method `\TgBotLib\Bot > setStickerSetThumbnail()` to set the thumbnail of a sticker set. 
   See [setStickerSetThumbnail](https://core.telegram.org/bots/api#setstickersetthumbnail) for more information.
 * Added method `\TgBotLib\Bot > setStickerSetTitle()` to set the title of a sticker set. 
   See [setStickerSetTitle](https://core.telegram.org/bots/api#setstickersettitle) for more information.
 * Added method `\TgBotLib\Bot > deleteStickerSet()` to delete a sticker set. 
   See [deleteStickerSet](https://core.telegram.org/bots/api#deletestickerset) for more information.
 * Added method `\TgBotLib\Bot > setStickerEmojiList()` to set the list of emojis for a sticker set. 
   See [setStickerEmojiList](https://core.telegram.org/bots/api#setstickeremojilist) for more information.
 * Added method `\TgBotLib\Bot > setStickerKeywords()` to set the list of emojis for a sticker set. 
   See [setStickerKeywords](https://core.telegram.org/bots/api#setstickerkeywords) for more information.

### Changed
 * Removed unused `__destruct()` method from `\TgBotLib\Bot`
 * Added proper construction for `PollOption[]` objects in `TgBotLib\Objects\Telegram > Poll`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > Animation` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > Audio` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > Document` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > Sticker` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > Video` to `thumbnail`
 * Renamed `thumb` field in `TgBotLib\Objects\Telegram > VideoNote` to `thumbnail`

## Fixed
 * Fixed `TgBotLib\Objects\Telegram > Sticker > toArray()` to properly return the `premium_animation` field

## [6.5.2] - 2023-02-26

### Added
 * Added dependency `net.nosial.tempfile` to create temporary files when uploading content from memory.
 * Added `\TgBotLib\Abstracts > ChatActionType`
 * Added logging events to `\TgBotLib\Bot > handleUpdate()`

### Fixed
 * Fixed file uploads when trying to upload content from memory.


## [6.5.1] - 2023-02-23

### Fixed
 * Added a null-safe check for `Poll`'s `explanation_entities` field. [#1](https://git.n64.cc/nosial/libs/tgbot/-/issues/1)


## [6.5.0] - 2023-02-20

### Added
 * First Release