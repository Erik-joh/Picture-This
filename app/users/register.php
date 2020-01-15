<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'], $_POST['password'], $_POST['name'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    if (userExists($email, $pdo)) {
        errorMessage('User already exists');
        redirect('/register.php');
    }
    $statement = $pdo->prepare('INSERT INTO users (name,email,password,avatar) VALUES (:name,:email,:password,"Empty")');
    $statement->execute([':name' => $name, ':email' => $email, ':password' => $password]);

    redirect('/login.php');
}
