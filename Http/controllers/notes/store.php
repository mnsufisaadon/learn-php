<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    // we need to add validation to the server side so user cannot bypass the client side.
    // eg: curl -X POST http://localhost:8888/notes/create -d 'body='
    $errors['body'] = 'The body with not more than 1000 characters is required.';
}

if (! empty($errors)) {
    
    Session::flash('errors', $errors);
    
    Session::flash('old', [
        'body' => $_POST['body'],
    ]);

    redirect('/notes/create');
}

$db->query("INSERT INTO `learn_php`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1,
]);

redirect('/notes');