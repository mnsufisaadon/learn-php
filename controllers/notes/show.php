<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$banner = "Note";
$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'banner' => 'Note',
    'note' => $note,
]);
