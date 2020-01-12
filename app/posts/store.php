<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we store/insert new posts in the database.
if (isset($_POST['title'], $_FILES['image'], $_POST['description'])) {
    $image = $_FILES['image'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $id = $_SESSION['user']['id'];

    if ($image['type'] !== 'image/png') {
        die(var_dump('error type'));
        errorMessage('Wrong file format, needs to be .png');
        redirect('/post.php');
    }
    $destination = filter_var('/assets/images/postsImages/' . date('ymd') . '-' . $image['name'], FILTER_SANITIZE_STRING);

    $statement = $pdo->prepare('INSERT INTO posts (title,image,content,users_id) VALUES (:title,:image,:content,:id)');

    $statement->execute([':title' => $title, ':image' => $destination, ':description' => $description, ':id' => $id]);
    move_uploaded_file($image['tmp_name'], __DIR__ . '/../../' . $destination);
    redirect('/post.php');
}
errorMessage('Atleast one field missing');
redirect('/post.php');
