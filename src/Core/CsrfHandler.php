<?php

namespace App\Core;

class CsrfHandler {
    public static function generateToken() {
        $container = Container::getInstance();
        $session = $container->get('session');
        $token = uniqid();
        if (!$session->get('_tokens')) {
            $session->set('_tokens', [$token]);
        } else {
            $tokens = $session->get('_tokens');
            array_push($tokens, $token);
            $session->set('_tokens', $tokens);
        }
    }

    public static function validToken(string $token) {
        $container = Container::getInstance();
        $session = $container->get('session');
        $tokens = $session->get('_tokens');
        if (!$tokens)
            return false;
        $id = array_search($token, $tokens);
        if ($id == -1)
            return false;
        unset($tokens[$id]);
        $session->set('_tokens', $tokens);
        return true;
    }
}