<?php

namespace Moris\Practice\Database\Interface;

interface DatabaseInterface {
    public function connect(): void;
    public function query(string $sql): \Iterator;
    public function prepare(string $sql): DatabaseStatement;
}
