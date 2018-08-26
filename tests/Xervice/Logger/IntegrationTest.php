<?php
declare(strict_types=1);

namespace XerviceTest\Logger;

use DataProvider\LogMessageDataProvider;
use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

require_once __DIR__ . '/TestInjector/LoggerConfig.php';
require_once __DIR__ . '/TestInjector/LoggerDependencyProvider.php';

/**
 * @method \Xervice\Logger\LoggerFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    protected function _after()
    {
        if (is_file($this->getLogFile())) {
            unlink($this->getLogFile());
        }
    }

    /**
     * @group Xervice
     * @group Logger
     * @group Integration
     */
    public function testAddLog()
    {
        $logMessage = new LogMessageDataProvider();
        $logMessage
            ->setTitle('Test')
            ->setMessage('Message')
            ->setContext('Context');

        $expectedString = sprintf(
            '%s - %s%s%s%s%s%s%s%s%s',
            date('Y-m-d H:i:s'),
            $logMessage->getTitle(),
            PHP_EOL,
            $logMessage->getMessage(),
            PHP_EOL,
            PHP_EOL,
            $logMessage->getContext(),
            PHP_EOL,
            PHP_EOL,
            PHP_EOL
        );

        $this->getFacade()->log($logMessage);

        $this->assertTrue(is_file($this->getLogFile()));

        $logContent = file($this->getLogFile());

        $this->assertContains(
            'Test',
            $logContent[0]
        );

        $this->assertEquals(
            'Message' . PHP_EOL,
            $logContent[1]
        );

        $this->assertEquals(
            'Context' . PHP_EOL,
            $logContent[3]
        );

        $this->assertEquals(
            $expectedString,
            file_get_contents($this->getLogFile())
        );
    }

    /**
     * @return string
     */
    private function getLogFile(): string
    {
        return __DIR__ . '/log/xervice.log';
    }
}