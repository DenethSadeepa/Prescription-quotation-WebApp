<?php

require 'init.php';
$config = require 'config.php';
require 'Validator.php';
$db = new Database($config);
$errors = [];
$user = new User();
if ($user->isLoggedIn()) {
    header('Location: /');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validation_rules = [
        'name' => 'required|alphanumeric',
        'email'  => 'required|email',
        'contact'      => 'required|phone',
        'address'      => 'required',
        'password' => 'required'
    ];

    $errors = $validator->validate($_POST, $validation_rules);

    if (empty($errors)) {
        $db->query('INSERT INTO users(name, email, address, contactNo, password) VALUES (:name, :email, :address, :contactNo, :password)', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'contactNo' => $_POST['contact'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);
        header('Location: /login');
        exit();
    }
}

require 'views/Auth/register.view.php';
