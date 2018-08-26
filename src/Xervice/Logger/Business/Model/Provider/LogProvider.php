<?php
declare(strict_types=1);

namespace Xervice\Logger\Business\Model\Provider;

use DataProvider\LogMessageDataProvider;
use Xervice\Logger\Business\Model\Handler\HandlerCollection;

class LogProvider implements LogProviderInterface
{
    /**
     * @var \Xervice\Logger\Business\Model\Handler\HandlerCollection
     */
    private $handlerCollection;

    /**
     * LogProvider constructor.
     *
     * @param \Xervice\Logger\Business\Model\Handler\HandlerCollection $handlerCollection
     */
    public function __construct(HandlerCollection $handlerCollection)
    {
        $this->handlerCollection = $handlerCollection;
    }

    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function log(LogMessageDataProvider $messageDataProvider): void
    {
        foreach ($this->handlerCollection as $handler) {
            $handler->handleLog($messageDataProvider);
        }
    }
}