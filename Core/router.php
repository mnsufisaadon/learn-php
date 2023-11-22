<?php

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort($code = 404) {
    http_response_code($code);

    require base_path("controllers/{$code}.php");

    die();
}

if(array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
} else {
    abort();
}