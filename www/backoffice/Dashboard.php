<?php
require_once __DIR__ . '/../boot/load.php';

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>


<!-- Start Content -->
<div class="container mt-3 mb-5 pb-4">
<!-- user -->
<div class="alert alert-primary text-center" role="alert">
    <strong>บัญชีผู้ใช้</strong>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/AddUser.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">เพิ่มบัญชีผู้ใช้</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/ManageUsers.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการบัญชีผู้ใช้</span>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Test -->
<div class="alert alert-success text-center mt-3" role="alert">
    <strong>การทดสอบ</strong>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="<?php echo __HOST__ ?>/backoffice/AddTest.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">เพิ่มการทดสอบ</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="./manageTest.html" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-cogs fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการการทดสอบ</span>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Organization -->
<div class="alert alert-warning text-center mt-3" role="alert">
    <strong>องค์กร</strong>
</div>
<div class="row">
    <div class="col-md-8">
        <a href="<?php echo __HOST__ ?>/backoffice/Organization.php" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-university fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการองค์กร</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="<?php echo __HOST__ ?>/migrate" class="text-center btn btn-block">
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-database fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">Migrate Database</span>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<?php require_once __DIR__.'/layout/foot.php'; ?>