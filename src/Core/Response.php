<?php

namespace App\Core;

class Response {
    private $body;
    private $status;
    private $headers;

    public function __construct(string $body, int $status = 200, array $headers)
    {
        $this->body = $body;
        $this->status = $status; 
        $this->headers = $headers;
    }

    public function __toString()
    {
        http_response_code($this->status);
        foreach ($this->headers as $k => $v)
            header("$k: $v");
        return $this->body;
    }
}