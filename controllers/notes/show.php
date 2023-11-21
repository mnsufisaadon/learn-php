<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$banner = "Note";

view('notes/show.view.php', [
    'banner' => 'Note',
    'note' => $note,
]);