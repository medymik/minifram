<?php

namespace App\Core;

// Container uses singleton pattern
// Will hold objects that the application needs
class Container
{
    private static $container;
    private $objects;

    private function __construct()
    {
        $this->objects = array();
    }

    public static function getInstance(): Container
    {
        // if there is not a container inst we create one
        if (is_null(self::$container))
            self::$container = new Container();
        return self::$container;
    }

    // get returns the object inst if found in the objects array otherwise null
    public function get(string $key)
    {
        if (!array_key_exists($key, $this->objects))
            return null;
        return $this->objects[$key];
    }

    // set insert an object inst into the array member objects
    public function set(string $key, Object $obj)
    {
        $this->objects[$key] = $obj;
    }

    // remove an inst from the objects array member by key
    public function remove(string $key)
    {
        if (array_key_exists($key, $this->objects))
        {
            unset($this->objects[$key]);
        }
    }
}