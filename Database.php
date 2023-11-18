<?php

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