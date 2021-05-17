<?php

namespace App\Core;

class Router
{
	private $request;

	public function __construct() {
		$this->request = new Request($_SERVER);
	}

	public function get(string $path, $callback)
	{
		if ($this->request->getMethod() != 'GET')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function post(string $path, $callback)
	{
		if ($this->request->getMethod() != 'POST')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function put(string $path, $callback)
	{
		if ($this->request->getMethod() != 'PUT')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}

	public function delete(string $path, $callback)
	{
		if ($this->request->getMethod() != 'DELETE')
			return;
		if ($this->request->routeMatch(explode('/', $path)))
		{
			$response = $callback($this->request);
			echo $response;
			exit;
		}
	}
}
