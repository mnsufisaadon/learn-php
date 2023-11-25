<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->get();

$banner = "My Notes";

view('notes/index.view.php', [
    'banner' => 'My Notes',
    'notes' => $notes,
]);