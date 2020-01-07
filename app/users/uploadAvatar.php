<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $destination = __DIR__ . '/../../assets/images/avatars/' . date('ymd') . '-' . $avatar['name'];

    move_uploaded_file($avatar['tmp_name'], $destination);
}
