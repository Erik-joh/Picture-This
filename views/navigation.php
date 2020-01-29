<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <?php if (isset($id)) : ?>
        <?php if (getUserById($id, $pdo)['avatar'] !== "Empty") : ?>
            <img src="<?php echo getUserById($id, $pdo)['avatar']
                        ?>" class="avatar-navigation">
        <?php endif; ?>
    <?php endif; ?>
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav nav-menu">
        <li class="nav-item">
            <a class="nav-link icon">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>

        <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/post.php">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/myPosts.php">My Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settings.php">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/search.php">Search</a>
            </li>

        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
            </li>
            <li>
                <a class="nav-link" href="/register.php">Register</a>
            </li>
        <?php endif; ?>
    </ul>

</nav>