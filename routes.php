<?php

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

$uri = $_SERVER['REQUEST_URI'];

function abort($code = 404) {
    http_response_code($code);

    require("controllers/{$code}.php");

    die();
}

if(array_key_exists($uri, $routes)) {
    require($routes[$uri]);
} else {
    abort();
}