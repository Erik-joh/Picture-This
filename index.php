<?php require __DIR__ . '/views/header.php'; ?>
<?php $posts = getAllPosts($pdo) ?>
<?php if (isset($_SESSION['user']['id'])) : ?>
    <article class="posts-container">
        <?php require __DIR__ . '/views/error.php'; ?>
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h2><?php echo $post['title'] ?></h2>
                <img src="<?php echo $post['image'] ?>">
                <p><?php echo $post['content'] ?></p>
                <form action="app/posts/likes.php" method="post" class="like-form">
                    <input type="hidden" name="like" value="<?php echo $post['id'] ?>">
                    <button type="Submit" class="btn btn-danger <?php echo ifLiked($id, $post['id'], $pdo) ?>"><?php echo unlikeOrLike($id, $post['id'], $pdo) ?></button>
                    <div class="total-likes">
                        <span>Number of likes:</span>
                        <span class="total-likes"><?php echo $post['likes'] ?></span>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </article>
<?php else :
    redirect('/login.php');
endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>