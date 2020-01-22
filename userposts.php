<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $posts = getUsersPosts($id, $pdo);
} else {
    redirect('/');
} ?>

<article>
    <?php require __DIR__ . '/views/error.php'; ?>

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