# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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