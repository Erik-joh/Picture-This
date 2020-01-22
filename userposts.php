<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $posts = getUsersPosts($id, $pdo);
    $user = getUserById($id, $pdo);
} else {
    redirect('/');
} ?>

<article>
    <?php require __DIR__ . '/views/error.php'; ?>
    <h2><?php echo getUserById($id, $pdo)['name'] ?>'s feed</h2>
    <form action="app/users/follow.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
        <button type="submit" name="" class="btn btn-primary"><?php echo (isFollowing($pdo, $user['id'], $_SESSION['user']['id']) ? 'Unfollow' : 'Follow'); ?></button>
    </form>

    <?php foreach ($posts as $post) : ?>

        <div class="post">
            <div class="form-group">
                <h2>Title</h2>
                <p><?php echo $post['title'] ?></p>
            </div>
            <div>
                <img src="<?php echo $post['image'] ?>">
            </div>
            <div class="mt-3 mb-3">
                <h2>Description</h2>
                <p><?php echo $post['content'] ?></p>
            </div>
            </form>
        </div>
</article>

<?php endforeach; ?> <?php require __DIR__ . '/views/footer.php'; ?>