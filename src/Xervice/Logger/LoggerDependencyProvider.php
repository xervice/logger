<?php
declare(strict_types=1);


namespace Xervice\Logger;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;
use Xervice\Logger\Business\Handler\HandlerCollection;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class LoggerDependencyProvider extends AbstractProvider
{
    public const LOG_HANDLER = 'log.handler';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::LOG_HANDLER] = function () {
            return new HandlerCollection(
                $this->getLogHandler()
            );
        };
    }

    /**
     * @return \Xervice\Logger\Business\Handler\LogHandlerInterface[]
     */
    protected function getLogHandler(): array
    {
        return [];
    }
}