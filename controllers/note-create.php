<?php

require 'Validator.php';
$config = require('config.php');
$db = new Database($config['database']);

$banner = "Create new note";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (! Validator::string($_POST['body'], 1, 1000)) {
        // we need to add validation to the server side so user cannot bypass the client side.
        // eg: curl -X POST http://localhost:8888/notes/create -d 'body='
        $errors['body'] = 'The body with not more than 1000 characters is required.';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO `learn_php`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

require "views/note-create.view.php";