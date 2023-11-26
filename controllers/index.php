<?php

$_SESSION['name'] = "John";

view('index.view.php', [
    'banner' => 'Home',
]);