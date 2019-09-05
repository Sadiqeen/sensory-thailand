<!-- Alert -->
<?php if ($_SESSION['error']): ?>
    <?php foreach ($_SESSION['error'] as $error) :?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <?php $_SESSION['error'] = [] ?>
<?php endif; ?>
<?php if ($_SESSION['success']): ?>
    <?php foreach ($_SESSION['success'] as $success) :?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> <?php echo $success ?>
        </div>
    <?php endforeach; ?>
    <?php $_SESSION['success'] = [] ?>
<?php endif; ?>
<!-- End alert -->