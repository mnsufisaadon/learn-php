<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = 1;

// find corresponding note

$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_POST['id'],
])->findOrFail();


// authorize user can edit note

authorize($note['user_id'] === $currentUserId);

// validate the form

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    // we need to add validation to the server side so user cannot bypass the client side.
    // eg: curl -X POST http://localhost:8888/notes/create -d 'body='
    $errors['body'] = 'The body with not more than 1000 characters is required.';
}

// if not valid, return errors

if (! empty($errors)) {

    $_SESSION['_flash']['errors'] = $errors;

    redirect("/note/edit?id={$_POST['id']}");
}

// if everything ok, update the note

$db->query("update notes set body = :body where id = :id", [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

redirect('/notes');