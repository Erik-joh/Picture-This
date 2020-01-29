<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['user_id'])) {
    $userId = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $followerId = $_SESSION['user']['id'];



    $statement = $pdo->prepare('SELECT * FROM followers WHERE user_id = :userId AND follower_id = :followerId');

    $statement->execute([':userId' => $userId, ':followerId' => $followerId]);
    $isFollowed = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$isFollowed) {
        $statement = $pdo->prepare('INSERT INTO followers (user_id,follower_id) VALUES (:userId,:followerId)');
        $statement->execute([':userId' => $userId, ':followerId' => $followerId]);
    } else {
        $statement = $pdo->prepare('DELETE FROM followers WHERE user_id = :userId AND follower_id = :followerId');
        $statement->execute([':userId' => $userId, ':followerId' => $followerId]);
    }

    $statement = $pdo->prepare('SELECT COUNT(*) FROM followers WHERE user_id = :userId');
    $statement->execute([':userId' => $userId]);
    $countFollowers = $statement->fetch(PDO::FETCH_ASSOC);
    $countFollowers = (int) $countFollowers["COUNT(*)"];

    // $statement = $pdo->prepare('UPDATE posts SET likes=:countedLikes WHERE id =:postId');
    // $statement->execute([':countedLikes' => $countedLikes, ':postId' => $postId]);


    header('Content-Type: application/json');
    echo json_encode($countFollowers);
    redirect('/userposts.php?id=' . $userId);
}
