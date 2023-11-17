<?php

require('./functions.php');

dd($_SERVER['REQUEST_URI']);

$banner = "Contact";

require "views/contact.view.php";