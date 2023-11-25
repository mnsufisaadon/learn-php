<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    // we need to add validation to the server side so user cannot bypass the client side.
    // eg: curl -X POST http://localhost:8888/notes/create -d 'body='
    $errors['body'] = 'The body with not more than 1000 characters is required.';
}

if (! empty($errors)) {

    return view('notes/create.view.php', [
        'banner' => 'Create new note',
        'errors' => $errors,
    ]);
}

$db->query("INSERT INTO `learn_php`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1,
]);

header('location: /notes');
exit();