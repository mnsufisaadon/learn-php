<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$banner = "Note";
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

header('location: /notes');
exit();