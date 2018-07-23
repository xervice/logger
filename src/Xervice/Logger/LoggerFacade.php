<?php
declare(strict_types=1);


namespace Xervice\Logger;


use DataProvider\LogMessageDataProvider;
use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Xervice\Logger\LoggerFactory getFactory()
 * @method \Xervice\Logger\LoggerConfig getConfig()
 * @method \Xervice\Logger\LoggerClient getClient()
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
}