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

        function filterByAuthor($books, $author) {
            $filteredBooks = [];
            
            foreach ($books as $book) {
                if ($book['author'] === $author) {
                    $filteredBooks[] = $book;
                }
            }

            return $filteredBooks;
        }
    ?>
    <h1>
        <h1>Recommended Books</h1>
        <ul>
            <?php foreach (filterByAuthor($books, 'Robert Kiyosaki') as $book) : ?>
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