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
    <div class="feed-information">

        <h2><?php echo getUserById($id, $pdo)['name'] ?>'s feed</h2>
        <form action="app/users/follow.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
            <button type="submit" name="" class="btn btn-primary"><?php echo (isFollowing($pdo, $user['id'], $_SESSION['user']['id']) ? 'Unfollow' : 'Follow'); ?></button>
        </form>
    </div>

    <?php foreach ($posts as $post) : ?>

        <div class="post-user">
            <div class="form-group">
                <h3>Title</h3>
                <p><?php echo $post['title'] ?></p>
            </div>
            <img src="<?php echo $post['image'] ?>">
            <h3>Description</h3>
            <p><?php echo $post['content'] ?></p>
            </form>
        </div>
</article>

<?php endforeach; ?> <?php require __DIR__ . '/views/footer.php'; ?>