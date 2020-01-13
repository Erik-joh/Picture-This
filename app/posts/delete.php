<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$postId = $_GET['id'];

$statement = $pdo->prepare('SELECT image FROM posts WHERE id=:postId AND users_id=:userId');
$statement->execute([':postId' => $postId, ':userId' => $id]);
$oldDestination = $statement->fetch(PDO::FETCH_ASSOC);
unlink(__DIR__ . '/../../' . $oldDestination['image']);

$statement = $pdo->prepare('DELETE FROM posts WHERE id=:postId AND users_id=:userId');
$statement->execute([':postId' => $postId, ':userId' => $id]);

redirect('/myPosts.php');
