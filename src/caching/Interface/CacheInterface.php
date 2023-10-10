<?php

namespace Moris\Practice\caching\Interface;

interface CacheInterface
{
    public function set(): void;
    public function get(): void;
    public function invalidate(): void;
}