<?php

namespace Moris\Practice\httpClient\Interface;

interface HttpClientInterface
{
    public function request(string $uri, string $method, array $data = []);
    public function getRequest(string $uri);
    public function postRequest(string $uri, array $data = []);
}