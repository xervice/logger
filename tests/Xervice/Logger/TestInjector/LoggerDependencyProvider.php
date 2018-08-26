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