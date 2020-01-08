<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $id = $_SESSION['user']['id'];
    $destination = filter_var('/app/users/../../assets/images/avatars/' . date('ymd') . '-' . $avatar['name'], FILTER_SANITIZE_STRING);
    $statement = $pdo->prepare('UPDATE users SET avatar=:avatar WHERE id =:id');
    $statement->execute([':avatar' => $destination, ':id' => $id]);
    move_uploaded_file($avatar['tmp_name'], __DIR__ . $destination);
}

redirect('/settings.php');
