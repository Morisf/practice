<?php

namespace Moris\Practice\Database\Interface;

interface DatabaseStatement {
    public function execute(array $params = []): bool;
    public function fetch(): array;
    public function fetchAll(): array;
}