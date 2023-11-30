<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;


try {
    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);
} catch(ValidationException $exception) {

    Session::flash('errors', $exception->errors());

    Session::flash('old', $exception->old());

    redirect('/login');
}



$auth = new Authenticator;

if ($auth->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

$form->error('email', 'Wrong credentials');

redirect('/login');


