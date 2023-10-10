<?php

namespace Moris\Practice\Authentication\Interface;

interface UserInterface
{
    public function setUsername(string $username);
    public function getUsername(): string;

    public function setPassword(string $username);
    public function getPassword(): string;
}