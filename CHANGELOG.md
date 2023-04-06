# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [6.6.0] - Unreleased

### Added
 * Added the ability to set different bot descriptions for different user languages using the method `\TgBotLib\Bot > setMyDescription()`
 * Added the ability to get the current bot description in the given language as the class [BotDescription](https://core.telegram.org/bots/api#botdescription)
   using the method `\TgBotLib\Bot > getMyDescription()`

### Changed
 * Removed unused `__destruct()` method from `\TgBotLib\Bot`
 * Added proper construction for `PollOption[]` objects in `TgBotLib\Objects\Telegram > Poll`

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