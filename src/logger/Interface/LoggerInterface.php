<?php

namespace Moris\Practice\logger\Interface;

interface LoggerInterface
{
    public function log(string $message);
    public function info(string $message);
    public function error(string $message);
}