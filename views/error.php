<?php
if (isset($_SESSION['errors'])) :
    foreach ($_SESSION['errors'] as $error) : ?>
        <p><?php echo $error ?></p>
<?php
    endforeach;
endif;
unset($_SESSION['errors']);
?>
