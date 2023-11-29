<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form

$errors = [];
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password more than 7 characters.';
}

// if error exists, redirect

if (! empty($errors)) {

    Session::flash('errors', $errors);
    
    Session::flash('old', [
        'email' => $email,
    ]);

    redirect('/register');
}

// if no error, check unique email

$db = App::resolve(Database::class);

$isEmailExist = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

// if email already exist, redirect
// if email not exist, store new user to db;

if ($isEmailExist) {

    redirect('/');
} else {

    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

}


// mark user has logged in

Session::put('user', [
    'email' => $email,
]);

redirect('/');