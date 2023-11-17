<?php

require('functions.php');
// require('routes.php');

$dsn = 'mysql:host=localhost;port=3306;dbname=learn_php';

$pdo = new PDO($dsn, 'root');

$statement = $pdo->prepare('select * from posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}

