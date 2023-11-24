<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($url) {
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $url;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function abort($code = 404) {
    http_response_code($code);

    require base_path("controllers/{$code}.php");

    die();
}

function view($path, $attributes = []) {
    extract($attributes);
    
    return require base_path('views/' . $path);
}