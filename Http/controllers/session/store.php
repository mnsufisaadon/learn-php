<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form

$form = new LoginForm;

$validate = $form->validate([
    'email' => $email,
    'password' => $password,
]);

if (! $validate) {
    return view('session/create.view.php', [
        'errors' => $form->errors(),
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
        
        login([
            'email' => $email,
        ]);
        
        header('location: /');
        exit();
    }

}

// if email not exist, login fail, redirect to homepage;

$errors['email'] = 'Wrong credentials';

return view('session/create.view.php', [
    'errors' => $errors,
]);




