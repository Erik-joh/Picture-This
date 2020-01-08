<?php

declare(strict_types=1);
if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 *
 */
function getUserById(int $id, PDO $pdo)
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE id=:id');
    $statement->execute([':id' => $id]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}
