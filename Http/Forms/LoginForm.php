<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {

    protected $errors = [];

    public function validate($attributes)
    {

        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($attributes['password'], 1, 255)) {
            $this->errors['password'] = 'A password is required';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}