<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
</head>
<body>
    <?php
        $book = "Rich Dad Poor Dad";
        $read = true;

        if($read) {
            $message = "You have read $book";
        } else {
            $message = "You have NOT read $book";
        }
    ?>
    <h1>
        
        <?= $message ?>
    </h1>
</body>
</html>