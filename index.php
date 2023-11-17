<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>
<body>
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

        function filterByAuthor($books, $fn) {
            $filteredBooks = [];

            foreach ($books as $book) {
                if ($fn($book)) {
                    $filteredBooks[] = $book;
                }
            }

            return $filteredBooks;
        }

        $filteredBooks = filterByAuthor($books, function($book) {
            return $book['author'] === 'Robert Kiyosaki';
        });
    ?>
    <h1>
        <h1>Recommended Books</h1>
        <ul>
            <?php foreach ($filteredBooks as $book) : ?>
                <li>
                    <a href="<?= $book['purchaseUrl'] ?>">
                        <?= "{$book['name']}™" ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </h1>
</body>
</html>