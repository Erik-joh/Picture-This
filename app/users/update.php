<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//In this file we edit user profile

if (isset($_POST['email'], $_POST['name'], $_POST['biography'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
    $statement = $pdo->prepare('SELECT password FROM users WHERE id=:id');
    $statement->execute([':id' => $_SESSION['user']['id']]);
    $password = $statement->fetch(PDO::FETCH_ASSOC);
    if (password_verify($_POST['password'], $password['password'])) {
        $statement = $pdo->prepare('UPDATE users SET name=:name, email=:email, biography=:biography;');
        $statement->execute([':name' => $name, ':email' => $email, ':biography' => $biography]);
    }
}
