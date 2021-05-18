<?php

class Session {
    private static $session = null;

    private function __construct() {
        // start using session
        session_start();
    }

    public static function getInstance() {
        if (is_null(self::$session)) {
            self::$session = new Session();
        }
        return self::$session;
    }

    public function set(string $key, string $value) {
        $_SESSION[$key] = $value;
    }

    public function remove(string $key) {
        if (key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
        }
    }

    public function get(string $key) {
        if (key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return null;
    }
}