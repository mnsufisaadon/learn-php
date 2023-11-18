<?php

require('functions.php');
// require('routes.php');
require('Database.php');

$db = new Database();
$posts = $db->query('select * from posts where id = 2')->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}

