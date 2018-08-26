<?php
declare(strict_types=1);


namespace Xervice\Logger\Business;


use DataProvider\LogMessageDataProvider;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Logger\Business\LoggerBusinessFactory getFactory()
 * @method \Xervice\Logger\LoggerConfig getConfig()
 */
class LoggerFacade extends AbstractFacade
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function log(LogMessageDataProvider $messageDataProvider): void
    {
        $this->getFactory()->createLogProvider()->log($messageDataProvider);
    }

    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function writeLogToFile(LogMessageDataProvider $messageDataProvider): void
    {
        $this->getFactory()->createFileWriter()->writeLog($messageDataProvider);
    }
}