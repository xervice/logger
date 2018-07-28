<?php

use App\Logger\LoggerConfig;
use Xervice\DataProvider\DataProviderConfig;

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/src/Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/src/',
    dirname(__DIR__) . '/vendor/',
];


$config[LoggerConfig::LOG_FILENAME] = 'xervice.log';
$config[LoggerConfig::LOG_PATH] = dirname(__DIR__) . '/logs';