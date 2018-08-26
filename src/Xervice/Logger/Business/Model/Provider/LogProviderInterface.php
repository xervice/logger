<?php
declare(strict_types=1);

namespace Xervice\Logger\Business\Model\Provider;

use DataProvider\LogMessageDataProvider;

interface LogProviderInterface
{
    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function log(LogMessageDataProvider $messageDataProvider);
}