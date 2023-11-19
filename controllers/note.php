<?php

$config = require('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


$query = "select * from notes where id = :id and user_id = :user_id";

$note = $db->query($query, [
    'id' => $_GET['id'],
    'user_id' => $currentUserId,
])->fetch();

if (!$note) {
    abort();
}


$banner = "Note";

require "views/note.view.php";