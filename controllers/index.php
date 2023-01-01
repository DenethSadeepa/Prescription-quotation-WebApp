<?php

require 'init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    header('Location: /login');
}

$time = date("Y-m-d h:i", strtotime("+2 hours"));

require 'views/index.view.php';
