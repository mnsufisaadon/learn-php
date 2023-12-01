<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {

    protected $errors = [];
    public $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'A password with minimum 7 characters is required';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        if ($instance->failed()) {
            $instance->throw();
        };

        return $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return ! empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}