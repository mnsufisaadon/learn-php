<?php

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

$uri = $_SERVER['REQUEST_URI'];

if(array_key_exists($uri, $routes)) {
    require($routes[$uri]);
} else {
    http_response_code(404);

    echo "Sorry. Not Found.";

    die();
}