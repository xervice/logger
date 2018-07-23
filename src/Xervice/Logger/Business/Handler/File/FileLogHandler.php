<?php
declare(strict_types=1);


namespace Xervice\Logger\Business\Handler\File;


use DataProvider\LogMessageDataProvider;
use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Logger\Business\Handler\LogHandlerInterface;

/**
 * @method \Xervice\Logger\LoggerFactory getFactory()
 */
class FileLogHandler extends AbstractWithLocator implements LogHandlerInterface
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function handleLog(LogMessageDataProvider $messageDataProvider): void
    {
        $this->getFactory()->createFileWriter()->writeLog($messageDataProvider);
    }
}
