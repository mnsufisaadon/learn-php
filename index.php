<?php

$books = [
    [
        'name' => 'Rich Dad Poor Dad',
        'author' => 'Robert Kiyosaki',
        'purchaseUrl' => 'http://localhost',
    ],
    [
        'name' => 'Friends',
        'author' => 'Richard',
        'purchaseUrl' => 'http://example.com',
    ],
    [
        'name' => 'How to Make Money',
        'author' => 'Robert Kiyosaki',
        'purchaseUrl' => 'http://localhost',
    ],
];

$filteredBooks = array_filter($books, function($book) {
    return $book['author'] === 'Robert Kiyosaki';
});

require "index.view.php";