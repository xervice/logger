<?php
declare(strict_types=1);


namespace Xervice\Logger;


use Xervice\Core\Factory\AbstractFactory;
use Xervice\Logger\Business\Handler\HandlerCollection;
use Xervice\Logger\Business\Provider\LogProvider;
use Xervice\Logger\Business\Provider\LogProviderInterface;
use Xervice\Logger\Business\Writer\FileWriter;
use Xervice\Logger\Business\Writer\FileWriterInterface;

/**
 * @method \Xervice\Logger\LoggerConfig getConfig()
 */
class LoggerFactory extends AbstractFactory
{
    /**
     * @return \Xervice\Logger\Business\Provider\LogProviderInterface
     */
    public function createLogProvider(): LogProviderInterface
    {
        return new LogProvider(
            $this->getLogHandlerCollection()
        );
    }

    /**
     * @return \Xervice\Logger\Business\Writer\FileWriterInterface
     */
    public function createFileWriter(): FileWriterInterface
    {
        return new FileWriter(
            $this->getConfig()->getLogPath(),
            $this->getConfig()->getLogFilename()
        );
    }

    /**
     * @return \Xervice\Logger\Business\Handler\HandlerCollection
     */
    public function getLogHandlerCollection(): HandlerCollection
    {
        return $this->getDependency(LoggerDependencyProvider::LOG_HANDLER);
    }
}