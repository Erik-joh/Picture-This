<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//In this file we edit user profile

if (isset($_POST['email'], $_POST['name'], $_POST['biography'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
    $statement = $pdo->prepare('SELECT password FROM users WHERE id=:id');
    $statement->execute([':id' => $id]);
    $password = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $password['password'])) {
        if (isset($_POST['newPassword'])) {
            $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
            $statement = $pdo->prepare('UPDATE users SET name=:name, password=:newPassword, email=:email, biography=:biography WHERE id =:id');
            $statement->execute([
                ':name' => $name,
                ':newPassword' => $newPassword,
                ':email' => $email,
                ':biography' => $biography,
                ':id' => $id
            ]);
        } else {
            $statement = $pdo->prepare('UPDATE users SET name=:name, email=:email, biography=:biography WHERE id =:id');
            $statement->execute([
                ':name' => $name,
                ':email' => $email,
                ':biography' => $biography,
                ':id' => $id
            ]);
        }
    }
    errorMessage('Wrong password');
}
redirect('/settings.php');
