<?php
declare(strict_types=1);


namespace Xervice\Logger\Business\Handler;


class HandlerCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\Logger\Business\Handler\LogHandlerInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\Logger\Business\Handler\LogHandlerInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\Logger\Business\Handler\LogHandlerInterface $validator
     */
    public function add(LogHandlerInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\Logger\Business\Handler\LogHandlerInterface
     */
    public function current(): LogHandlerInterface
    {
        return $this->collection[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->collection);
    }
}