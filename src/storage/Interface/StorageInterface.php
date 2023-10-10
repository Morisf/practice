<?php

namespace Moris\Practice\storage\Interface;

interface StorageInterface
{
    public function saveItem();
    public function getItem();
    public function removeItem();
}