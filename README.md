# TgBotLib

TgBotLib is a library for creating Telegram Bots in PHP, based on the [Telegram Bot API](https://core.telegram.org/bots/api).

The approach taken by this library is to be as close as possible to the Telegram Bot API, while providing a simple and
easy to use interface that is easy to understand and out of your way, allowing you to use the library as a simple
wrapper around the API.

## Installation

The library can be installed using ncc:

```bash
ncc install -p "nosial/libs.tgbot=latest@n64"
```

or by adding the following to your project.json file under the `build.dependencies` section:
```json
{
  "name": "net.nosial.tgbotlib",
  "version": "latest",
  "source_type": "remote",
  "source": "nosial/libs.tgbot=latest@n64"
}
```

If you don't have the n64 source configured, you can add it by running the following command:
```bash
ncc source add --name n64 --type gitlab --host git.n64.cc
```


## Usage

 1. Import the library using `import('net.nosial.tgbotlib');`
 2. Create a new instance of the `TgBotLib\Bot` class, passing the bot token as the first argument
 3. Profit

```php

require 'ncc';
import('net.nosial.tgbotlib');

$bot = new TgBotLib\Bot('<BOT TOKEN>');

/** @var \TgBotLib\Objects\Telegram\Update $update */
foreach ($bot->getUpdates() as $update)
{
    $bot->sendMessage($update->getMessage()->getChat()->getId(), 'Hello World!');
}
```

Each method of the `TgBotLib\Bot` class is named after the corresponding method of the Telegram Bot API, all methods
contains an optional `$parameters` argument that can be used to pass additional parameters to the API method.

But for methods that has required parameters, the library provides a more convenient way to pass them, by using
named parameters. For example, the `sendMessage` method requires the `chat_id` and `text` parameters, but instead
of passing them as an array, you can pass them as named parameters:

```php
$bot->sendMessage('<CHAT ID>', 'Hello World!', [
    'parse_mode' => 'Markdown',
    'disable_web_page_preview' => true,
]);
```

## Documentation

Almost everything in the library has PhpDoc documentation, so you can use your IDE to get documentation for the
library. For example, in PhpStorm, you can press `Ctrl+Q` on a method to get the documentation for it:

![PhpStorm Documentation](assets/documentation.png)

# License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
