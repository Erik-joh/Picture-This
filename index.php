<?php require __DIR__ . '/views/header.php'; ?>
<?php $posts = getAllPosts($pdo) ?>

<article class="posts-container">
    <?php require __DIR__ . '/views/error.php'; ?>
    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <h2><?php echo $post['title'] ?></h2>
            <img src="<?php echo $post['image'] ?>">
            <p><?php echo $post['content'] ?></p>
            <a class="like">Like</a>
        </div>
    <?php endforeach; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
