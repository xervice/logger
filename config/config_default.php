<?php

use Xervice\DataProvider\DataProviderConfig;
use Xervice\Logger\LoggerConfig;

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/src/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/src/',
    dirname(__DIR__) . '/vendor/',
];


if (class_exists(LoggerConfig::class)) {
    $config[LoggerConfig::LOG_FILENAME] = 'xervice.log';
    $config[LoggerConfig::LOG_PATH] = dirname(__DIR__) . '/logs';
}