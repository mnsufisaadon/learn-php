<?php

require('functions.php');
// require('routes.php');

class Database {

    public $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;port=3306;dbname=learn_php';

        $this->connection = new PDO($dsn, 'root');
    }

    public function query($query)
    {
        
        $statement = $this->connection->prepare($query);
        $statement->execute();
        
        return $statement;
    }
}

$db = new Database();
$posts = $db->query('select * from posts where id = 2')->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}

