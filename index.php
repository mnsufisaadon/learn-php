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
        ];
    ?>
    <h1>
        <h1>Recommended Books</h1>
        <ul>
            <?php foreach ($books as $book) : ?>
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