<?php

use Core\App;

$db = App::container()->resolve('Core\Database');

$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->get();

$banner = "My Notes";

view('notes/index.view.php', [
    'banner' => 'My Notes',
    'notes' => $notes,
]);