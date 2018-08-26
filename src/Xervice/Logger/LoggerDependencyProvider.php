<?php
declare(strict_types=1);


namespace Xervice\Logger;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\Logger\Business\Model\Handler\HandlerCollection;

class LoggerDependencyProvider extends AbstractDependencyProvider
{
    public const LOG_HANDLER = 'log.handler';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addLogHandler($container);

        return $container;
    }

    /**
     * @return \Xervice\Logger\Business\Dependency\Handler\LogHandlerInterface[]
     */
    protected function getLogHandler(): array
    {
        return [];
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addLogHandler(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::LOG_HANDLER] = function () {
            return new HandlerCollection(
                $this->getLogHandler()
            );
        };
        return $container;
}
}