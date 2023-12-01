<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (! $signedIn) {
    $form->error('email', 'Wrong credentials')->throw();
}

redirect('/');

