<?php

namespace Moris\Practice\Authentication\Interface;

interface AuthenticationInterface
{
    public function authenticate(): UserInterface;
    public function logout(): bool;
    public function isAuthenticated(): bool;
}