<?php

$config = require('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$banner = "Note";

require "views/note.view.php";