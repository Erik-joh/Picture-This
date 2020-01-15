<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['like'])) {
    $postId = filter_var($_POST['like'], FILTER_SANITIZE_NUMBER_INT);


    $statement = $pdo->prepare('SELECT * FROM likes WHERE posts_id = :postId AND users_id = :userId');
    $statement->execute([':postId' => $postId, ':userId' => $id]);
    $isliked = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$isliked) {
        $statement = $pdo->prepare('INSERT INTO likes (posts_id,users_id) VALUES (:postId,:userId)');
        $statement->execute([':postId' => $postId, ':userId' => $id]);
    } else {
        $statement = $pdo->prepare('DELETE FROM likes WHERE posts_id = :postId AND users_id = :userId');
        $statement->execute([':postId' => $postId, ':userId' => $id]);
    }

    $statement = $pdo->prepare('SELECT COUNT(*) FROM likes WHERE posts_id = :postId');
    $statement->execute([':postId' => $postId]);
    $countedLikes = $statement->fetch(PDO::FETCH_ASSOC);
    $countedLikes = (int) $countedLikes["COUNT(*)"];

    $statement = $pdo->prepare('UPDATE posts SET likes=:countedLikes WHERE id =:postId');
    $statement->execute([':countedLikes' => $countedLikes, ':postId' => $postId]);


    header('Content-Type: application/json');
    echo json_encode($countedLikes);
}
