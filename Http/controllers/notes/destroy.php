<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;


$query = "select * from notes where id = :id";

$note = $db->query($query, [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$query = "delete from notes where id = :id";

$delete = $db->query($query, [
    'id' => $_POST['id'],
]);

redirect('/notes');