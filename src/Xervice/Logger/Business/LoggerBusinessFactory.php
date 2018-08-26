<?php
declare(strict_types=1);


namespace Xervice\Logger\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Logger\Business\Model\Handler\HandlerCollection;
use Xervice\Logger\Business\Model\Provider\LogProvider;
use Xervice\Logger\Business\Model\Provider\LogProviderInterface;
use Xervice\Logger\Business\Model\Writer\FileWriter;
use Xervice\Logger\Business\Model\Writer\FileWriterInterface;
use Xervice\Logger\LoggerDependencyProvider;

/**
 * @method \Xervice\Logger\LoggerConfig getConfig()
 */
class LoggerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Xervice\Logger\Business\Model\Provider\LogProviderInterface
     */
    public function createLogProvider(): LogProviderInterface
    {
        return new LogProvider(
            $this->getLogHandlerCollection()
        );
    }

    /**
     * @return \Xervice\Logger\Business\Model\Writer\FileWriterInterface
     */
    public function createFileWriter(): FileWriterInterface
    {
        return new FileWriter(
            $this->getConfig()->getLogPath(),
            $this->getConfig()->getLogFilename()
        );
    }

    /**
     * @return \Xervice\Logger\Business\Model\Handler\HandlerCollection
     */
    public function getLogHandlerCollection(): HandlerCollection
    {
        return $this->getDependency(LoggerDependencyProvider::LOG_HANDLER);
    }
}