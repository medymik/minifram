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
}