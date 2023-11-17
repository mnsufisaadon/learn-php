<?php

require('./functions.php');

dd($_SERVER['REQUEST_URI']);

$banner = "Home";

require "views/index.view.php";