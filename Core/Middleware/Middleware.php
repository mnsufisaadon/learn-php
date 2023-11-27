<?php

namespace Core\Middleware;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Exception;

class Middleware {

    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key)
    {
        $middleware = static::MAP[$key] ?? false;

        if (! $key) {
            return;
        }

        if (! $middleware) {
            throw new Exception("No matching middleware for key $key.");
        }

        (new $middleware)->handle();
    }

}