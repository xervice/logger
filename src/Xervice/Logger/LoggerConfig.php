<?php
declare(strict_types=1);


namespace Xervice\Logger;


use Xervice\Core\Business\Model\Config\AbstractConfig;

class LoggerConfig extends AbstractConfig
{
    public const LOG_PATH = 'log.path';
    public const LOG_FILENAME = 'log.filename';

    /**
     * @return string
     */
    public function getLogPath(): string
    {
        return $this->get(self::LOG_PATH);
    }

    /**
     * @return string
     */
    public function getLogFilename(): string
    {
        return $this->get(self::LOG_FILENAME, 'xervice.log');
    }
}