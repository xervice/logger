<?php
declare(strict_types=1);

namespace Xervice\Logger\Business\Writer;

use DataProvider\LogMessageDataProvider;

interface FileWriterInterface
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function writeLog(LogMessageDataProvider $messageDataProvider): void;
}