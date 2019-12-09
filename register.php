<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Register</h1>

    <form action="app/users/register.php" method="post">
        <div class="form-group">
            <label for="email">Enter email here:</label>
            <input class="form-control" type="email" name="email" required>
            <small class="form-text text-muted">Please provide an email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Enter password here:</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide a password (passphrase).</small>
        </div><!-- /form-group -->

        <div>
        <label for="name">Enter your name here:</label>
            <input class="form-control" type="name" name="name" required>
            <small class="form-text text-muted">Please provide a name</small>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
