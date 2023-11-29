<?php

view('notes/create.view.php', [
    'banner' => 'New note',
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);