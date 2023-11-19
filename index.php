<?php

require('functions.php');
require('Database.php');
// require('routes.php');

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

// calling variable directly inside query will cause a threat! like below
// $query = "select * from posts where id = $id";

$query = "select * from posts where id = :id";

$posts = $db->query($query, ['id' => $id])->fetch();

dd($posts);
