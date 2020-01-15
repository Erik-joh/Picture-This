<?php require __DIR__ . '/views/header.php'; ?>
<?php $posts = getUsersPosts($id, $pdo) ?>

<article class="posts-container">
    <?php require __DIR__ . '/views/error.php'; ?>
    <?php foreach ($posts as $post) :
    ?>
        <div class="post">
            <form action="app/posts/update.php?id=<?php echo $post['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="post" name="title" value="<?php echo $post['title'] ?>">
                    <small class="form-text text-muted">Please provide an title to your post.</small>
                </div>
                <div>
                    <img src="<?php echo $post['image'] ?>">
                    <input class="mt-3" type="file" name="image" accept=".png">
                </div>
                <div class="mt-3 mb-3">
                    <label for="description">Description</label>
                    <input class="form-control" type="post" name="description" value="<?php echo $post['content'] ?>">
                    <small class="form-text text-muted">Please provide a description</small>
                </div>


                <button type="submit" class="btn btn-primary mt-2 mb-2">Edit</button>
            </form>
            <form action="app/posts/delete.php?id=<?php echo $post['id'] ?>" method="post">
                <button type="submit" class="btn btn-primary mb-3">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>

</article>
<?php require __DIR__ . '/views/footer.php'; ?>
