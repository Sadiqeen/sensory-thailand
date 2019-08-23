<?php
require_once __DIR__ . '/../boot/load.php';

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>


<!-- Start Content -->
<div class="container mt-3">
<!-- user -->
<div class="alert alert-primary text-center" role="alert">
    <strong>User</strong>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/AddUser.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add User</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/ManageUsers.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage User</h4>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Test -->
<div class="alert alert-success text-center mt-3" role="alert">
    <strong>Test</strong>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/AddTest.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Test</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="./manageTest.html" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Test</h4>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Organization -->
<div class="alert alert-warning text-center mt-3" role="alert">
    <strong>Organization</strong>
</div>
<div class="row">
    <div class="col-md-8">
        <a href="<?php echo __HOST__ ?>/backoffice/Organization.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Organization</h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="<?php echo __HOST__ ?>/migrate" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Migrate Database</h4>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<?php require_once __DIR__.'/layout/foot.php'; ?>