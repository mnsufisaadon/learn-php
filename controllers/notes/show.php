<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve('Core\Database');

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
