<?php

$config = require('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_GET['id'],
])->fetch();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(403);
}


$banner = "Note";

require "views/note.view.php";