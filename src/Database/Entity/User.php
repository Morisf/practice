<?php

namespace Moris\Practice\Database\Entity;

use Moris\Practice\Authentication\Interface\UserInterface;
use Moris\Practice\Database\Interface\EntityInterface;

class User implements EntityInterface, UserInterface
{

    public function setUsername(string $username)
    {
        // TODO: Implement setUsername() method.
    }

    public function getUsername(): string
    {
        // TODO: Implement getUsername() method.
    }

    public function setPassword(string $username)
    {
        // TODO: Implement setPassword() method.
    }

    public function getPassword(): string
    {
        // TODO: Implement getPassword() method.
    }
}