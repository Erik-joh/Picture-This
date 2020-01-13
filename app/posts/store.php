<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we store/insert new posts in the database.
if (isset($_POST['title'], $_FILES['image'], $_POST['description'])) {
    $image = $_FILES['image'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $id = (int) $_SESSION['user']['id'];

    if ($image['type'] !== 'image/png') {
        die(var_dump('error type'));
        errorMessage('Wrong file format, needs to be .png');
        redirect('/post.php');
    }
    $destination = filter_var('/assets/images/postsImages/' . date('ymd') . '-' . $image['name'], FILTER_SANITIZE_STRING);

    // $statement = $pdo->prepare('INSERT INTO posts (title,image,content,users_id) VALUES ("test","image","content",2)');
    // $statement->execute();
    $statement = $pdo->prepare('INSERT INTO posts (title,content,users_id,image) VALUES (:title,:content,:id,:image)');

    $statement->execute([':title' => $title, ':image' => $destination, ':content' => $description, ':id' => $id]);

    move_uploaded_file($image['tmp_name'], __DIR__ . '/../../' . $destination);
    errorMessage('Posted');
    redirect('/post.php');
}
errorMessage('Atleast one field missing');
redirect('/post.php');
