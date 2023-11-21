<?php
//to start the server, need to run 'php -S localhost:8888 -t public'

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'functions.php';
require base_path('Database.php');
require base_path('Response.php');
require base_path('router.php');

