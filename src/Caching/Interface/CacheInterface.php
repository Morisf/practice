<?php

namespace Moris\Practice\Caching\Interface;

interface CacheInterface
{
    public function set(string $key, $value): void;
    public function get(string $key);
    public function invalidate(string $key): void;
    public function isExists(string $key): bool;
}