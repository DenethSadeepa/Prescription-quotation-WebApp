<?php

require 'init.php';

$config = require 'config.php';
require 'Validator.php';
$db = new Database($config);
$_db = Database::getDbInstance();
$errors = [];
$user = new User();
if ($user->isLoggedIn()) {
    header('Location: /');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validator = new Validator();
    $validation_rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    $errors = $validator->validate($_POST, $validation_rules);

    if (empty($errors)) {
        $data = $db->get('Select id,password from users where email = :email', [
            'email' => $_POST['email']
        ]);

        if (password_verify($_POST['password'], $data['password'])) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['uid'] = $data['id'];
            header('Location: /');
        }
    }
}

require('views/Auth/login.view.php');
