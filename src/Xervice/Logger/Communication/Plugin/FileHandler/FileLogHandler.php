<?php
declare(strict_types=1);


namespace Xervice\Logger\Communication\Plugin\FileHandler;


use DataProvider\LogMessageDataProvider;
use Xervice\Core\Plugin\AbstractCommunicationPlugin;
use Xervice\Logger\Business\Dependency\Handler\LogHandlerInterface;

/**
 * @method \Xervice\Logger\Business\LoggerFacade getFacade()
 */
class FileLogHandler extends AbstractCommunicationPlugin implements LogHandlerInterface
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function handleLog(LogMessageDataProvider $messageDataProvider): void
    {
        $this->getFacade()->writeLogToFile($messageDataProvider);
    }
}
