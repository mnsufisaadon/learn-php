<?php

require('./functions.php');

dd($_SERVER['REQUEST_URI']);

$banner = "About";

require "views/about.view.php";