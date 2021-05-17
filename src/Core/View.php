<?php

namespace App\Core;

class View {
    public static function render(string $view, array $data) {
        ob_start();
        extract($data);
        include $_SERVER['DOCUMENT_ROOT'].'/../templates/'.$view;
        return new HtmlResponse(ob_get_clean());
    }
}