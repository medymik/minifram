<?php

namespace App\Core;

class JsonResponse extends Response {
    public function __construct(array $body, int $status = 200)
    {
        parent::__construct(json_encode($body), $status, ['Content-Type' => 'text/json']);
    }
}