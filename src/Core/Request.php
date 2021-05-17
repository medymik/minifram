<?php

namespace App\Core;

class Request {
        private $method;
        private $uri;
        private $uri_args;
        private $params;

        public function routeMatch(array $args) : bool {
                if (count($args) != count($this->uri_args))
                        return false;
                $params = [];
                for ($i = 0; $i < count($args); $i++)
                {
                        if ($args[$i] != $this->uri_args[$i])
                        {
                                if ($args[$i][0] == ':')
                                {
                                        $params[substr($args[$i], 1, strlen($args[$i]))] = $this->uri_args[$i];
                                }
                                else
                                {
                                        return false;
                                }
                        }
                }
                $this->params = $params;
                return true;
        }

        public function __construct(array $server_request)
        {
                $this->method = $server_request['REQUEST_METHOD'];
                $this->uri = $server_request['REQUEST_URI'];
                // avoid the query params
                $pos = strrpos($this->uri, "?");
                if ($pos) {
                        $this->uri = substr($this->uri, 0, $pos);
                }
                $this->uri_args = explode('/', $this->uri);
                $this->query = $_GET;
        }

        public function getMethod() : string {
                return $this->method;
        }

        public function getUri() : string {
                return $this->uri;
        }

        public function __toString() : string {
                $infos = array(
                        'method' => $this->method,
                        'uri' => $this->uri,
                        'args' => $this->uri_args,
                        'params' => $this->params,
                );
                return json_encode($infos);
        }
}