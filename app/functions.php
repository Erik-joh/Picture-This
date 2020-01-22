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
    function redirect(string $path): void
    {
        header("Location: ${path}");
        exit;
    }
}

if (!function_exists('getUserById')) {
    /**
     *returns user data by id
     *
     * @param int $id
     * @param PDO $pdo
     *
     * @return array
     */
    function getUserById(int $id, PDO $pdo): array
    {
        $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->execute([':id' => $id]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        } else {
            return [];
        }
    }
}
if (!function_exists('errorMessage')) {
    /**
     * adds an error message to session error variable
     *
     * @param string $error
     *
     * @return void
     */
    function errorMessage(string $error): void
    {
        $_SESSION['errors'][] = $error;
    }
}
if (!function_exists('userExists')) {
    /**
     * checks if user exists by email and return true/false
     *
     *@param string $email
     *@param PDO $pdo
     *
     * @return bool
     */
    function userExists(string $email, PDO $pdo): bool
    {
        $statement = $pdo->prepare('SELECT id from users WHERE email=:email');
        $statement->execute([':email' => $email]);
        $id = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$id) {
            return false;
        }
        return true;
    }
}
if (!function_exists('getUsersPosts')) {
    /**
     * returns an array with all posts created by user
     *
     *@param int $id
     *@param PDO $pdo
     *
     * @return array
     */
    function getUsersPosts(int $id, PDO $pdo): array
    {
        $statement = $pdo->prepare('SELECT * FROM posts WHERE users_id=:id');
        $statement->execute([':id' => $id]);
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
}
if (!function_exists('getAuthor')) {
    /**
     *
     * @param int $id
     * @param PDO $pdo
     *
     * @return string
     *
     */

    function getAuthor(int $id, PDO $pdo)
    {
        $statement = $pdo->prepare('SELECT name FROM users WHERE id=:id');
        $statement->execute([':id' => $id]);
        $name = $statement->fetch(PDO::FETCH_ASSOC);
        return $name['name'];
    }
}
if (!function_exists('getAllPosts')) {
    /**
     * returns an array with all posts
     *
     *@param PDO $pdo
     *
     * @return array
     */
    function getAllPosts(PDO $pdo): array
    {
        $statement = $pdo->prepare('SELECT * FROM posts');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
}
if (!function_exists('ifLiked')) {
    /**
     * returns an string depending on the user has liked a post or not
     *
     *@param int $userId
     *@param int $postId
     *@param PDO $pdo
     *
     * @return string
     */
    function ifLiked(int $userId, int $postId, PDO $pdo): string
    {
        $statement = $pdo->prepare('SELECT * FROM likes WHERE users_id=:userId AND posts_id=:postId');
        $statement->execute([':userId' => $userId, ':postId' => $postId]);
        $posts = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$posts) {
            return "Unlike";
        }
        return "Like";
    }
}
if (!function_exists('unlikeOrLike')) {
    /**
     * returns an string depending on the user has liked a post or not
     *
     *@param int $userId
     *@param int $postId
     *@param PDO $pdo
     *
     * @return string
     */
    function unlikeOrLike(int $userId, int $postId, PDO $pdo): string
    {
        $result = ifLiked($userId, $postId, $pdo);

        if ($result === "Unlike") {
            return "Like";
        }
        return "Unlike";
    }
}

if (!function_exists('searchForUser')) {

    /**
     * 
     * @param string $search
     * @param PDO $pdo
     * @return array
     * 
     */

    function searchForUser($search, $pdo)
    {
        $search = trim(filter_var($_POST['search'], FILTER_SANITIZE_STRING));
        $search = "%$search%";

        $statement = $pdo->prepare('SELECT id, name, avatar FROM users WHERE name LIKE :search');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':search', $search, PDO::PARAM_STR);
        $statement->execute();

        $usersFromSearch = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $usersFromSearch;
    }
}
