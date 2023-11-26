<?php

use Core\App;
use Core\Database;
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
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

// if no error, check unique email

$db = App::resolve(Database::class);

$isEmailExist = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

// if email already exist, redirect
// if email not exist, store new user to db;

if ($isEmailExist) {

    header('location: /');
    exit();

} else {

    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => $password,
    ]);

}


// mark user has logged in

$_SESSION['user'] = [
    'email' => $email,
];

header('location: /');
exit();