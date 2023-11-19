<?php

require('functions.php');
require('Database.php');
// require('routes.php');

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

$query = "select * from posts where id = $id";


$posts = $db->query($query)->fetch();

dd($posts);
