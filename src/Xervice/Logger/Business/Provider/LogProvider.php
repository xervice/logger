<?php
declare(strict_types=1);


namespace Xervice\Logger\Business\Provider;


use DataProvider\LogMessageDataProvider;
use Xervice\Logger\Business\Handler\HandlerCollection;

class LogProvider implements LogProviderInterface
{
    /**
     * @var \Xervice\Logger\Business\Handler\HandlerCollection
     */
    private $handlerCollection;

    /**
     * LogProvider constructor.
     *
     * @param \Xervice\Logger\Business\Handler\HandlerCollection $handlerCollection
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