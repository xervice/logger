<?php
declare(strict_types=1);


namespace Xervice\Logger\Business\Dependency\Handler;


use DataProvider\LogMessageDataProvider;

interface LogHandlerInterface
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function handleLog(LogMessageDataProvider $messageDataProvider): void;
}