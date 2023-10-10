<?php

namespace Moris\Practice\Database\Interface;

interface EntityIteratorInterface extends \Iterator
{
    public function addItem(EntityInterface $entity): void;
}