<?php require __DIR__ . '/views/header.php'; ?>
<article>
    <h1>Upload Avatar</h1>
    <form action="app/users/uploadAvatar.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose a PNG image to upload</label>
            <input type="file" name="avatar" id="avatar" accept=".png" required>
        </div>

        <button type="submit">Upload</button>
    </form>
</article>
<article>
    <h1>Edit profile</h1>

    <form action="app/users/update.php" method="post">
        <div class="form-group">
            <label for="email">Enter new email here:</label>
            <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
            <small class="form-text text-muted">Please provide an email address.</small>
        </div><!-- /form-group -->

        <div>
            <label for="name">Enter new name here:</label>
            <input class="form-control" type="name" name="name" value="<?php echo $_SESSION['user']['name'] ?>">
            <small class="form-text text-muted">Please provide a name</small>
        </div>

        <div>
            <label for="name">Enter biography here:</label>
            <input class="form-control" type="biography" name="biography" value="<?php if (isset($_SESSION['user']['biography'])) {
                                                                                        echo $_SESSION['user']['biography'];
                                                                                    } else {
                                                                                        echo 'Empty';
                                                                                    } ?>">
            <small class="form-text text-muted">Please provide a biography</small>
        </div>

        <div class="form-group">
            <label for="newPassword">Enter new password here:</label>
            <input class="form-control" type="password" name="newPassword">
            <small class="form-text text-muted">Please provide a new password (passphrase).</small>
        </div><!-- /form-group -->

        <div>
            <label for="password">Enter old password here:</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide your old password (passphrase).</small>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</article>



<?php require __DIR__ . '/views/footer.php'; ?>
