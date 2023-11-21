<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->get();

$banner = "My Notes";

view('notes/index.view.php', [
    'banner' => 'My Notes',
    'notes' => $notes,
]);