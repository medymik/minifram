<?php

namespace App\Core;

class HtmlResponse extends Response {
    public function __construct(string $body, int $status = 200)
    {
        parent::__construct($body, $status, ['Content-Type' => 'text/html']);
    }
}