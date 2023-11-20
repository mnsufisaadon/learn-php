<?php

$banner = "Create new note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd('You have submitted the form.');
}

require "views/note-create.view.php";