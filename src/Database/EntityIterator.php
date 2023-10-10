<?php

namespace Moris\Practice\Database;

use Moris\Practice\Database\Interface\EntityInterface;
use Moris\Practice\Database\Interface\EntityIteratorInterface;
use ReturnTypeWillChange;

class EntityIterator implements EntityIteratorInterface
{

    private array $list = [];
    private int $position = 0;

    public function __construct()
    {
        $this->position = 0;
    }

    public function current(): int
    {
        return $this->list[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    #[ReturnTypeWillChange]
    public function next(): void
    {
        ++$this->position;
    }

    #[ReturnTypeWillChange]
    public function rewind(): int
    {
        $this->position = 0;
    }

    #[ReturnTypeWillChange]
    public function valid(): bool
    {
        return isset($this->list[$this->position]);
    }

    public function addItem(EntityInterface $entity): void
    {
        $this->list[] = $entity;
    }

    public function length(EntityInterface $entity): int
    {
        return count($this->list);
    }


}