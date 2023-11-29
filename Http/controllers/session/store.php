<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;


$form = new LoginForm;

$validate = $form->validate([
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

if ($validate) {

    $auth = new Authenticator;

    if ($auth->attempt($_POST['email'], $_POST['password'])) {
        redirect('/');
    }

    $form->error('email', 'Wrong credentials');
}

Session::flash('errors', $form->errors());

redirect('/login');



