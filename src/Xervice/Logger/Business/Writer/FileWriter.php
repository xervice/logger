<?php
declare(strict_types=1);


namespace Xervice\Logger\Business\Writer;


use DataProvider\LogMessageDataProvider;

class FileWriter implements FileWriterInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $filename;

    /**
     * FileWriter constructor.
     *
     * @param string $path
     * @param string $filename
     */
    public function __construct(string $path, string $filename)
    {
        $this->path = $path;
        $this->filename = $filename;
    }

    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     */
    public function writeLog(LogMessageDataProvider $messageDataProvider): void
    {
        $this->createFileIfNotExist();

        file_put_contents(
            $this->getLogFile(),
            $this->getLogContent($messageDataProvider),
            FILE_APPEND
        );
    }

    /**
     * @param \DataProvider\LogMessageDataProvider $messageDataProvider
     *
     * @return string
     */
    private function getLogContent(LogMessageDataProvider $messageDataProvider): string
    {
        return sprintf(
            '%s - %s%s%s%s%s%s%s%s%s',
            date('Y-m-d H:i:s'),
            $messageDataProvider->getTitle(),
            PHP_EOL,
            $messageDataProvider->getMessage(),
            PHP_EOL,
            PHP_EOL,
            $messageDataProvider->getContext(),
            PHP_EOL,
            PHP_EOL,
            PHP_EOL
        );
    }

    /**
     * @return string
     */
    private function getLogFile(): string
    {
        return $this->path . '/' . $this->filename;
    }

    private function createFileIfNotExist(): void
    {
        if (!is_file($this->getLogFile())) {
            touch($this->getLogFile());
        }
    }
}