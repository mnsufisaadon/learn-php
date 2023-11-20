<?php

$config = require('config.php');
$db = new Database($config['database']);

$banner = "Create new note";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($_POST['body']) === 0) {
        // we need to add validation to the server side so user cannot bypass the client side.
        // eg: curl -X POST http://localhost:8888/notes/create -d 'body='
        $errors['body'] = 'A body is required.';
    }

    if (strlen(($_POST['body'])) > 1000) {
        $errors['body'] = 'The body can not be more than 1000 characters.';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO `learn_php`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

require "views/note-create.view.php";