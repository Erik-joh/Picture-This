<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we login users.

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->execute([':email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    //if user is empty redirects to login.php
    if ($user === false) {
        redirect('/login.php');
    }

    //checks password if password is correct and sets session user and redirects to index.php
    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);
        $_SESSION['user']['id'] = $user['id'];
        redirect('/');
    }
}
