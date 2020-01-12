<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Post</h1>
    <?php require __DIR__ . '/views/error.php'; ?>
    <form action="app/posts/store.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Enter title of your post here:</label>
            <input class="form-control" type="post" name="title" required>
            <small class="form-text text-muted">Please provide an title to your post.</small>
        </div>
        <div>
            <label for="image">Choose a PNG image to upload for your post</label>
            <input class="form-control" type="file" name="image" accept=".png" required>
        </div>
        <div>
            <label for="description">Enter your description here:</label>
            <input class="form-control" type="post" name="description" required>
            <small class="form-text text-muted">Please provide a description</small>
        </div>

        <button type="submit" class="btn btn-primary">Post</button>
    </form>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
