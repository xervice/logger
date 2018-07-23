<?php


namespace App\Logger;


use Xervice\Logger\LoggerConfig as XerviceLoggerConfig;

class LoggerConfig extends XerviceLoggerConfig
{
    /**
     * @return string
     */
    public function getLogPath(): string
    {
        return dirname(__DIR__) . '/log';
    }
}