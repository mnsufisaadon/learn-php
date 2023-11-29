<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$banner = "Note";
$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'banner' => 'Edit Note',
    'errors' => Session::get('errors'),
    'note' => $note,
]);