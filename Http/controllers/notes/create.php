<?php

use Core\Session;

view('notes/create.view.php', [
    'banner' => 'New note',
    'errors' => Session::get('errors'),
]);