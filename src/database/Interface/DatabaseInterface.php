<?php

namespace Moris\Practice\database\Interface;

interface DatabaseInterface
{
    public function connect();
    public function query();
    public function fetchOne();
    public function fetchAll();
}