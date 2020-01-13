<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update posts in the database.

$postId = $_GET['id'];
if ($_FILES['image']['name'] !== "") {
    $image = $_FILES['image'];
    if ($image['type'] !== 'image/png') {
        errorMessage('Wrong file format, needs to be .png');
        redirect('/myPosts.php');
    }
    //gets old file destination from database and removes that image
    $statement = $pdo->prepare('SELECT image FROM posts WHERE id=:postId AND users_id=:userId');
    $statement->execute([':postId' => $postId, ':userId' => $id]);
    $oldDestination = $statement->fetch(PDO::FETCH_ASSOC);
    unlink(__DIR__ . '/../../' . $oldDestination['image']);

    //adds the new image to the database and moves it to the right folder
    $destination = filter_var('/assets/images/postsImages/' . date('ymd') . '-' . $image['name'], FILTER_SANITIZE_STRING);
    $statement = $pdo->prepare('UPDATE posts SET image=:image WHERE id=:postId AND users_id=:userId');
    $statement->execute([
        ':image' => $destination,
        ':postId' => $postId,
        ':userId' => $id
    ]);
    move_uploaded_file($image['tmp_name'], __DIR__ . '/../../' . $destination);
}
if (isset($_POST['title'], $_POST['description'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    //updates title and description
    $statement = $pdo->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:postId AND users_id=:userId');
    $statement->execute([
        ':title' => $title,
        'content' => $description,
        ':postId' => $postId,
        ':userId' => $id
    ]);
}


redirect('/myPosts.php');
