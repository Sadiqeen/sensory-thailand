<!-- Alert -->
<?php if (isset($_SESSION['error'])): ?>
<?php foreach ($_SESSION['error'] as $error) :?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error!</strong> <?php echo $error ?>
</div>
<?php endforeach; ?>
<?php unset($_SESSION['error']) ?>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Success!</strong> <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>
</div>
<?php endif; ?>
<!-- End alert -->