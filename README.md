Xervice: Logger
========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/logger/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/logger/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/logger/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/logger/?branch=master)


Installation
-----------------
```
composer require xervice/logger
```

Configuration
-----------------
If you want to use the FileLogger, you have to define the path and the filename in your config.

```php
<?php

use App\Logger\LoggerConfig;

$config[LoggerConfig::LOG_FILENAME] = 'xervice.log';
$config[LoggerConfig::LOG_PATH] = dirname(__DIR__) . '/logs';
```

In default, there is no action for incoming logs. You can add log handler to handle incoming logs.
You can use the default FileLogger. To add a log handler, you can define them in the dependency provider.

```php
<?php


namespace App\Logger;


use Xervice\Logger\Communication\Plugin\FileHandler\FileLogHandler;
use Xervice\Logger\LoggerDependencyProvider as XerviceLoggerDependencyProvider;

class LoggerDependencyProvider extends XerviceLoggerDependencyProvider
{
    /**
     * @return array
     */
    protected function getLogHandler(): array
    {
        return [
            new FileLogHandler()
        ];
    }
}
```

It's possible to add multiple log handler. In that case every log is handled by all log handler.