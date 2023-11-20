<?php

$config = require('config.php');
$db = new Database($config['database']);

$banner = "Create new note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $db->query("INSERT INTO `learn_php`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1,
   ]);
}

require "views/note-create.view.php";