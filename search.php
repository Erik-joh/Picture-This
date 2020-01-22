<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <?php require __DIR__ . '/views/error.php'; ?>

    <h1>Search user by name</h1>

    <form action="search.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" autocomplete="off" name="search">
            <br>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <?php if (isset($_POST['search'])) : ?>
        <?php $users = searchForUser($_POST['search'], $pdo); ?>


        <?php if (empty($users)) : ?>
            <p>Sorry, there is no user by that name</p>
        <?php endif; ?>


        <?php foreach ($users as $user) : ?>
            <div class="search-results">
                <form action="/userposts.php" method="get">
                    <img class="search-image" src="<?php echo $user['avatar'] ?>" alt="">
                    <button type="submit" name="id" value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</article>



<?php require __DIR__ . '/views/footer.php'; ?>