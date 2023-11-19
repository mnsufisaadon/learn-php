<?php

$config = require('config.php');
$db = new Database($config['database']);

$query = "select * from notes where user_id = 1";

$notes = $db->query($query)->fetchAll();

$banner = "My Notes";

require "views/notes.view.php";