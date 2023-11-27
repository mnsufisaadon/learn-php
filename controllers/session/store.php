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

if (! Validator::string($password, 1, 255)) {
    $errors['password'] = 'A password is required';
}

// if error exists, redirect

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
    ]);
}

// if no error, check user email

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

// if email already exist, check password



if ($user) {

    if (password_verify($password, $user['password'])) {
    
        $_SESSION['user'] = [
            'email' => $email,
        ];

        session_regenerate_id();
        
        header('location: /');
        exit();
    }

}

// if email not exist, login fail, redirect to homepage;

$errors['email'] = 'Wrong credentials';

return view('session/create.view.php', [
    'errors' => $errors,
]);




