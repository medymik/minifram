<?php

namespace App\Core;

class Router
{
	private $request;

	public function __construct() {
		$this->request = new Request($_SERVER);
	}

	private function execMiddlewares($middlewares) {
		foreach($middlewares as $middleware) {
			$middleware($this);
		}
	}

	public function get(string $path, $callback, $middlewares = [])
	{
		if ($this->request->getMethod() != 'GET')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$this->execMiddlewares($middlewares);
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function post(string $path, $callback, $middlewares = [])
	{
		if ($this->request->getMethod() != 'POST')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$this->execMiddlewares($middlewares);
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function put(string $path, $callback, $middlewares = [])
	{
		if ($this->request->getMethod() != 'PUT')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$this->execMiddlewares($middlewares);
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function delete(string $path, $callback, $middlewares = [])
	{
		if ($this->request->getMethod() != 'DELETE')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$this->execMiddlewares($middlewares);
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}
}
