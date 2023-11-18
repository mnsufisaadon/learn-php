<?php

require('functions.php');
// require('routes.php');
require('Database.php');

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'learn_php',
];

$db = new Database($config);
$posts = $db->query('select * from posts')->fetchAll();

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}

