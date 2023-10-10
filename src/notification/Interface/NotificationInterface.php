<?php

namespace Moris\Practice\notification\Interface;

interface NotificationInterface
{
    public function send(string $message): void;
}