<?php
if (isset($_SESSION['errors'])) :
    foreach ($_SESSION['errors'] as $error) : ?>
        <p class="alert alert-danger"><?php echo $error ?></p>
<?php
    endforeach;
endif;
unset($_SESSION['errors']);
?>
