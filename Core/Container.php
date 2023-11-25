<?php

namespace Core;

use Exception;

class Container {

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            return throw new Exception("No binding found for $key");
        }

        $resolver = $this->bindings[$key];

        //need to use call_user_func to use the return function
        return call_user_func($resolver);
    }
}