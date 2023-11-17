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
            "Rich Dad Poor Dad",
            "Friends",
            "Attack On Titan",
        ];
    ?>
    <h1>
        <h1>Recommended Books</h1>
        <ul>
            <?php foreach ($books as $book) : ?>
                <li><?= "{$book}™" ?></li>
            <?php endforeach ?>
        </ul>
    </h1>
</body>
</html>